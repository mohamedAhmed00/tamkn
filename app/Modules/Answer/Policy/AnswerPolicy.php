<?php

namespace App\Modules\Answer\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the answer.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-answer');
    }

    /**
     * Determine whether the user can create answers.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-answer');
    }

    /**
     * Determine whether the user can update the answer.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-answer');
    }

    /**
     * Determine whether the user can delete the answer.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-answer');
    }
}
