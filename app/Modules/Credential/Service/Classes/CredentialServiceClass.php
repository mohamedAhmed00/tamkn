<?php

namespace App\Modules\Credential\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Credential\Repository\Interfaces\CredentialInterface;
use App\Modules\Credential\Service\Interfaces\CredentialServiceInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;
use Auth;

class CredentialServiceClass extends BaseServiceClass implements CredentialServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * @var
     */
    protected $roleService;


    public function __construct(CredentialInterface $credential,RoleServiceInterface $roleService)
    {
        $this->repository = $credential;
        $this->roleService = $roleService;
    }

    /**
     * @param array $data
     * @author Nader Ahmed
     * @return string
     */
    public function login(array $data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            if($this->roleService->getById(Auth::user()->role_id)->slug != 'client')
            {
                return "auth.home";
            }
            else
            {
                return "public";
            }
        } else {
            return false;
        }
    }

    /**
     * @author Nader Ahmed
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }
}

