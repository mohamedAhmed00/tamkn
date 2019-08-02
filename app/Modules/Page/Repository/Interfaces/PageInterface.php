<?php

namespace App\Modules\Page\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface PageInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();
}
