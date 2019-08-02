<?php

namespace App\Modules\Test\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Test\Repository\Interfaces\TestInterface;
use App\Modules\Test\Service\Interfaces\TestServiceInterface;

class TestServiceClass extends BaseServiceClass implements TestServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * TestServiceClass constructor.
     * @param TestInterface $test
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(TestInterface $test)
    {
        $this->repository = $test;
        parent::__construct($this->repository);
    }

    /**
     * @param int $part_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $part_id)
    {
        return $this->repository->getAllWithDescription($part_id);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
       $bool = ($this->repository->getById($id)->Products->count() != 0)? true : false  ;
       return $bool;
    }
}

