<?php

namespace App\Modules\Course\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface CourseInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();
}
