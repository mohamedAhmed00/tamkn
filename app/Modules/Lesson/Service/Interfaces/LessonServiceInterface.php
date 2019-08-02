<?php

namespace App\Modules\Lesson\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface LessonServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $part_id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
