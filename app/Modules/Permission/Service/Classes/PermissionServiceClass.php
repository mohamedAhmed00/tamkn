<?php

namespace App\Modules\Permission\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Permission\Repository\Interfaces\PermissionInterface;
use App\Modules\Permission\Service\Interfaces\PermissionServiceInterface;

class PermissionServiceClass extends BaseServiceClass implements PermissionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * PermissionServiceClass constructor.
     * @param PermissionInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(PermissionInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Permissions());
        return true;
    }
}

