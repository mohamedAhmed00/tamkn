<?php

namespace App\Modules\RolePermission\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;
use App\Modules\Role\Model\Role;

interface RolePermissionServiceInterface extends BaseServiceInterface
{
    /**
     * @param array $data
     * @param Role $role
     * @author Nader Ahmed
     * @return mixed
     */
    public function setPermissions(array $data ,  Role $role);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);
}
