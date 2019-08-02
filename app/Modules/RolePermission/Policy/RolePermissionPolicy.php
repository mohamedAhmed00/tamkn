<?php

namespace App\Modules\RolePermission\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role-permission.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-role-permission');
    }

    /**
     * Determine whether the user can create categories.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-role-permission');
    }

    /**
     * Determine whether the user can update the role-permission.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-role-permission');
    }

    /**
     * Determine whether the user can delete the role-permission.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-role-permission');
    }
}
