<?php

namespace App\Modules\SliderItem\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class SliderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sliderItem.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-slideritem');
    }

    /**
     * Determine whether the user can create sliderItems.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-slideritem');
    }

    /**
     * Determine whether the user can update the sliderItem.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-slideritem');
    }

    /**
     * Determine whether the user can delete the sliderItem.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-slideritem');
    }
}
