<?php

namespace App\Modules\Lesson\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Lesson\Repository\Interfaces\LessonDescriptionInterface;
use App\Modules\Lesson\Service\Interfaces\LessonDescriptionServiceInterface;

class LessonDescriptionServiceClass extends BaseServiceClass implements LessonDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * LessonServiceClass constructor.
     * @param LessonDescriptionInterface $lessonDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(LessonDescriptionInterface $lessonDescription)
    {
        $this->repository = $lessonDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $lessonId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $lessonId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $sound = $this->soundUpload($arr['sound_'.$language->key],'lesson');
            $video = $this->videoUpload($arr['video_'.$language->key],'lesson');
            $lang = ['name' => $arr['name_'.$language->key] , 'content' => $arr['content_'.$language->key] , 'sound' => $sound , 'video' => $video ,'lesson_id' => $lessonId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $lessonId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $lessonId)
    {
        $descriptions = $this->repository->getWhere(['lesson_id' => $lessonId]);
        foreach($descriptions as $description)
        {
            $this->removeImageFromDisk($description->sound);
            $this->removeImageFromDisk($description->video);
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

