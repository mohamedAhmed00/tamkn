<?php

namespace App\Modules\Document\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface DocumentInterface extends BaseInterface
{
    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $lesson_id);
}
