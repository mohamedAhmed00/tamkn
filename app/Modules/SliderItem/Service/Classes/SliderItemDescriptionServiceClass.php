<?php

namespace App\Modules\SliderItem\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemDescriptionInterface;
use App\Modules\SliderItem\Service\Interfaces\SliderItemDescriptionServiceInterface;

class SliderItemDescriptionServiceClass extends BaseServiceClass implements SliderItemDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * SliderItemServiceClass constructor.
     * @param SliderItemDescriptionInterface $sliderItemDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(SliderItemDescriptionInterface $sliderItemDescription)
    {
        $this->repository = $sliderItemDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $sliderItemId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $sliderItemId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $file = $this->fileUpload($arr['file_'.$language->key],'sliderItem');
            $lang = ['title' => $arr['title_'.$language->key] , 'file' => $file , 'sliderItem_id' => $sliderItemId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $sliderItemId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $sliderItemId)
    {
        $descriptions = $this->repository->getWhere(['sliderItem_id' => $sliderItemId]);
        foreach($descriptions as $description)
        {
            $this->removeImageFromDisk($description->file);
            $description->delete();
        }
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
       $bool = ($this->repository->getById($id)->Products->count() != 0)? true : false  ;
       return $bool;
    }
}

