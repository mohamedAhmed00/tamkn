<?php

namespace App\Modules\Course\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface CourseDescriptionServiceInterface extends BaseServiceInterface
{

    /**
     * @param array $arr
     * @param int $courseId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $courseId);

    /**
     * @param int $courseId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $courseId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

}
