<?php

namespace App\Modules\Course\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Course\Repository\Interfaces\CourseInterface;
use App\Modules\Course\Service\Interfaces\CourseServiceInterface;

class CourseServiceClass extends BaseServiceClass implements CourseServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * CourseServiceClass constructor.
     * @param CourseInterface $course
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(CourseInterface $course)
    {
        $this->repository = $course;
        parent::__construct($this->repository);
    }

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription()
    {
        return $this->repository->getAllWithDescription();
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

