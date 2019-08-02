<?php

namespace App\Modules\News\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface NewsInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription();
}
