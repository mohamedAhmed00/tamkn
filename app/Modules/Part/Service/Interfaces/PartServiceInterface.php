<?php

namespace App\Modules\Part\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface PartServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $course_id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
