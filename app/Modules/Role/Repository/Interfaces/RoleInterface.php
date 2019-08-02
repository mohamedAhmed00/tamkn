<?php

namespace App\Modules\Role\Repository\Interfaces;

use App\Generic\Repository\Interfaces\BaseInterface;

interface RoleInterface extends BaseInterface
{
    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function parts();
}
