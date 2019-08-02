<?php

namespace App\Modules\SliderItem\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface SliderItemServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $lesson_id);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
