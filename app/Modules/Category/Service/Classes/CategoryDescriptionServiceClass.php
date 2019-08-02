<?php

namespace App\Modules\Category\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Category\Repository\Interfaces\CategoryDescriptionInterface;
use App\Modules\Category\Service\Interfaces\CategoryDescriptionServiceInterface;

class CategoryDescriptionServiceClass extends BaseServiceClass implements CategoryDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * CategoryServiceClass constructor.
     * @param CategoryDescriptionInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(CategoryDescriptionInterface $categoryDescription)
    {
        $this->repository = $categoryDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $categoryId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $categoryId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['name' => $arr['name_'.$language->key],'category_id' => $categoryId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $categoryId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $categoryId)
    {
        $descriptions = $this->repository->getWhere(['category_id' => $categoryId]);
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

