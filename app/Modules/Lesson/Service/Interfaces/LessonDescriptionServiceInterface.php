<?php

namespace App\Modules\Lesson\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface LessonDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $lessonId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $lessonId);

    /**
     * @param int $lessonId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $lessonId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
