<?php

namespace App\Modules\Credential\Service\Interfaces;

use App\Generic\Service\Interfaces\BaseServiceInterface;

interface CredentialServiceInterface extends BaseServiceInterface
{
    /**
     * @param array $data
     * @author Nader Ahmed
     * @return boolean
     */
    public function login(array $data);

    /**
     * @author Nader Ahmed
     * @return void
     */
    public function logout();
}
