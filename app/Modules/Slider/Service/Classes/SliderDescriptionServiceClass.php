<?php

namespace App\Modules\Slider\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Slider\Repository\Interfaces\SliderDescriptionInterface;
use App\Modules\Slider\Service\Interfaces\SliderDescriptionServiceInterface;

class SliderDescriptionServiceClass extends BaseServiceClass implements SliderDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * SliderServiceClass constructor.
     * @param SliderDescriptionInterface $slider
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(SliderDescriptionInterface $sliderDescription)
    {
        $this->repository = $sliderDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $sliderId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $sliderId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['name' => $arr['name_'.$language->key] , 'description' => $arr['description_'.$language->key] ,'slider_id' => $sliderId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $sliderId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $sliderId)
    {
        $descriptions = $this->repository->getWhere(['slider_id' => $sliderId]);
        foreach($descriptions as $description)
        {
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

