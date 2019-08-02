<?php

namespace App\Modules\Setting\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the setting.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-setting');
    }

    /**
     * Determine whether the user can create setting.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-setting');
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-setting');
    }

    /**
     * Determine whether the user can delete the setting.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-setting');
    }
}
