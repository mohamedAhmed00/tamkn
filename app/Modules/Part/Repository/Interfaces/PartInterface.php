<?php

namespace App\Modules\Part\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface PartInterface extends BaseInterface
{
    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $course_id);
}
