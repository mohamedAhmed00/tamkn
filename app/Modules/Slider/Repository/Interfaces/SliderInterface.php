<?php

namespace App\Modules\Slider\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface SliderInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();
}
