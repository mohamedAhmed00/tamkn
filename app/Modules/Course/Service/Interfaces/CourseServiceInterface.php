<?php

namespace App\Modules\Course\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface CourseServiceInterface extends BaseServiceInterface
{

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
