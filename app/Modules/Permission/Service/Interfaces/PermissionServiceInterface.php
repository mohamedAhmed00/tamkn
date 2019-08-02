<?php

namespace App\Modules\Permission\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface PermissionServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
