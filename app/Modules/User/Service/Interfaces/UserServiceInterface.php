<?php

namespace App\Modules\User\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface UserServiceInterface extends BaseServiceInterface
{

    /**
     * @param int $roleId
     * @author Nader Ahmed
     * @return mixed
     */
    public function specificUser($roleId);

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id);

    /**
     * @param  $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveUser( $request);

    /**
     * @param  $request
     * @param  int $id
     * @author Nader Ahmed
     * @return void
     */
    public function updateUser( $request,int $id);
}
