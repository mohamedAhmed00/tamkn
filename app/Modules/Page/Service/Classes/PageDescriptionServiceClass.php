<?php

namespace App\Modules\Page\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Page\Repository\Interfaces\PageDescriptionInterface;
use App\Modules\Page\Service\Interfaces\PageDescriptionServiceInterface;

class PageDescriptionServiceClass extends BaseServiceClass implements PageDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * PageServiceClass constructor.
     * @param PageDescriptionInterface $page
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(PageDescriptionInterface $pageDescription)
    {
        $this->repository = $pageDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $pageId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $pageId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['name' => $arr['name_'.$language->key] , 'description' => $arr['description_'.$language->key] , 'content' => $arr['content_'.$language->key],'page_id' => $pageId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $pageId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $pageId)
    {
        $descriptions = $this->repository->getWhere(['page_id' => $pageId]);
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

