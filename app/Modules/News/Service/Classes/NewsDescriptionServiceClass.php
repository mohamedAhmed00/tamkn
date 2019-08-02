<?php

namespace App\Modules\News\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\News\Repository\Interfaces\NewsDescriptionInterface;
use App\Modules\News\Service\Interfaces\NewsDescriptionServiceInterface;

class NewsDescriptionServiceClass extends BaseServiceClass implements NewsDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * NewsServiceClass constructor.
     * @param NewsDescriptionInterface $news
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(NewsDescriptionInterface $newsDescription)
    {
        $this->repository = $newsDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $newsId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $newsId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['name' => $arr['name_'.$language->key] , 'description' => $arr['description_'.$language->key] , 'content' => $arr['content_'.$language->key],'new_id' => $newsId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $newsId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $newsId)
    {
        $descriptions = $this->repository->getWhere(['new_id' => $newsId]);
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

