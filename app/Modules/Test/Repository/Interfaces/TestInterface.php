<?php

namespace App\Modules\Test\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface TestInterface extends BaseInterface
{
    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $part_id);
}
