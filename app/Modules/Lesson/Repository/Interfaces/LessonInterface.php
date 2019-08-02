<?php

namespace App\Modules\Lesson\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface LessonInterface extends BaseInterface
{
    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $part_id);
}
