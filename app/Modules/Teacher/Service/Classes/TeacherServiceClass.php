<?php

namespace App\Modules\Teacher\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Teacher\Repository\Interfaces\TeacherInterface;
use App\Modules\Teacher\Service\Interfaces\TeacherServiceInterface;

class TeacherServiceClass extends BaseServiceClass implements TeacherServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * TeacherServiceClass constructor.
     * @param TeacherInterface $teacher
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(TeacherInterface $teacher)
    {
        $this->repository = $teacher;
        parent::__construct($this->repository);
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

