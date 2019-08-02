<?php

namespace App\Modules\Category\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface CategoryInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();
}
