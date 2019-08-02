<?php

namespace App\Modules\RolePermission\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Role\Model\Role;
use App\Modules\Role\Repository\Interfaces\RoleInterface;
use App\Modules\RolePermission\Repository\Interfaces\RolePermissionInterface;
use App\Modules\RolePermission\Service\Interfaces\RolePermissionServiceInterface;

class RolePermissionServiceClass extends BaseServiceClass implements RolePermissionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * RolePermissionServiceClass constructor.
     * @param RolePermissionInterface $rolePermission
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(RolePermissionInterface $rolePermission)
    {
        $this->repository = $rolePermission;
        parent::__construct($this->repository);
    }

    /**
     * @param array $data
     * @param Role $role
     * @author Nader Ahmed
     * @return mixed
     */
    public function setPermissions(array $data ,  Role $role)
    {
        $this->removeAllPermissionForRole($role);
        $this->assignPermission($data['permission'],$role);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->RolePermissions());
        return true;
    }

    /**
     * @param Role $role
     * @author Nader Ahmed
     */
    private function removeAllPermissionForRole(Role $role)
    {
        $role->Permissions()->detach();
    }

    /**
     * @param array $data
     * @param Role $role
     * @author Nader Ahmed
     */
    private function assignPermission(array  $data , Role $role)
    {
        foreach($data as $permsission)
        {
            $this->repository->assignPermission($permsission,$role);
        }
    }
}

