<?php

namespace App\Modules\Part\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Part\Repository\Interfaces\PartInterface;
use App\Modules\Part\Service\Interfaces\PartServiceInterface;

class PartServiceClass extends BaseServiceClass implements PartServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * PartServiceClass constructor.
     * @param PartInterface $part
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(PartInterface $part)
    {
        $this->repository = $part;
        parent::__construct($this->repository);
    }

    /**
     * @param int $course_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $course_id)
    {
        return $this->repository->getAllWithDescription($course_id);
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

