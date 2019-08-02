<?php

namespace App\Modules\Course\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Course\Repository\Interfaces\CourseDescriptionInterface;
use App\Modules\Course\Service\Interfaces\CourseDescriptionServiceInterface;

class CourseDescriptionServiceClass extends BaseServiceClass implements CourseDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * CourseServiceClass constructor.
     * @param CourseDescriptionInterface $courseDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(CourseDescriptionInterface $courseDescription)
    {
        $this->repository = $courseDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $courseId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $courseId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['name' => $arr['name_'.$language->key] , 'description' => $arr['description_'.$language->key] , 'content' => $arr['content_'.$language->key],'course_id' => $courseId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $courseId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $courseId)
    {
        $descriptions = $this->repository->getWhere(['course_id' => $courseId]);
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

