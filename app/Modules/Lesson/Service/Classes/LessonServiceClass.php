<?php

namespace App\Modules\Lesson\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Lesson\Repository\Interfaces\LessonInterface;
use App\Modules\Lesson\Service\Interfaces\LessonServiceInterface;

class LessonServiceClass extends BaseServiceClass implements LessonServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * LessonServiceClass constructor.
     * @param LessonInterface $lesson
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(LessonInterface $lesson)
    {
        $this->repository = $lesson;
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

