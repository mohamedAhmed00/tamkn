<?php

namespace App\Modules\User\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface UserInterface extends BaseInterface
{
    /**
     * @param int $roleId
     * @author Nader Ahmed
     * @return mixed
     */
    public function specificUser($roleId);
}
