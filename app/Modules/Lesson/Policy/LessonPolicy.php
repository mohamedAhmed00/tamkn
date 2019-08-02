<?php

namespace App\Modules\Lesson\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lesson.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-lesson');
    }

    /**
     * Determine whether the user can create lessons.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-lesson');
    }

    /**
     * Determine whether the user can update the lesson.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-lesson');
    }

    /**
     * Determine whether the user can delete the lesson.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-lesson');
    }
}
