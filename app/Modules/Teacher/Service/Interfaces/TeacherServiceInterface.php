<?php

namespace App\Modules\Teacher\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface TeacherServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
