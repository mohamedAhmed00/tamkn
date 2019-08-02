<?php

namespace App\Modules\Role\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Role\Repository\Interfaces\RoleInterface;
use App\Modules\Role\Service\Interfaces\RoleServiceInterface;

class RoleServiceClass extends BaseServiceClass implements RoleServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * RoleServiceClass constructor.
     * @param RoleInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(RoleInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function parts()
    {
        return $this->repository->parts();
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Roles());
        return true;
    }
}

