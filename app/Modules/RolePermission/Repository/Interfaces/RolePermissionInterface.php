<?php

namespace App\Modules\RolePermission\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;
use App\Modules\Role\Model\Role;

interface RolePermissionInterface extends BaseInterface
{
    /**
     * @param int $permission
     * @param Role $role
     * @author Nader Ahmed
     * @return mixed
     */
    public function assignPermission(int $permission,Role $role );
}
