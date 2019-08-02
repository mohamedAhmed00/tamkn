<?php

namespace App\Modules\Teacher\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the teacher.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-teacher');
    }

    /**
     * Determine whether the user can create teachers.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-teacher');
    }

    /**
     * Determine whether the user can update the teacher.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-teacher');
    }

    /**
     * Determine whether the user can delete the teacher.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-teacher');
    }
}
