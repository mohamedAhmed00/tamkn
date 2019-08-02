<?php

namespace App\Modules\Page\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the page.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-page');
    }

    /**
     * Determine whether the user can create pages.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-page');
    }

    /**
     * Determine whether the user can update the page.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-page');
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-page');
    }
}
