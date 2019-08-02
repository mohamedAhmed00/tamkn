<?php

namespace App\Modules\Part\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class PartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the part.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-part');
    }

    /**
     * Determine whether the user can create parts.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-part');
    }

    /**
     * Determine whether the user can update the part.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-part');
    }

    /**
     * Determine whether the user can delete the part.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-part');
    }
}
