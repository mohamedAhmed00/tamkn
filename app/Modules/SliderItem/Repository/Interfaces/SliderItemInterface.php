<?php

namespace App\Modules\SliderItem\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface SliderItemInterface extends BaseInterface
{
    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $lesson_id);
}
