<?php

namespace App\Modules\Part\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Part\Repository\Interfaces\PartDescriptionInterface;
use App\Modules\Part\Service\Interfaces\PartDescriptionServiceInterface;

class PartDescriptionServiceClass extends BaseServiceClass implements PartDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * PartServiceClass constructor.
     * @param PartDescriptionInterface $partDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(PartDescriptionInterface $partDescription)
    {
        $this->repository = $partDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $partId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $partId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['title' => $arr['title_'.$language->key] ,'part_id' => $partId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $partId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $partId)
    {
        $descriptions = $this->repository->getWhere(['part_id' => $partId]);
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

