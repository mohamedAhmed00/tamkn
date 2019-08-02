<?php

namespace App\Modules\Question\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Question\Repository\Interfaces\QuestionInterface;
use App\Modules\Question\Service\Interfaces\QuestionServiceInterface;

class QuestionServiceClass extends BaseServiceClass implements QuestionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * QuestionServiceClass constructor.
     * @param QuestionInterface $question
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(QuestionInterface $question)
    {
        $this->repository = $question;
        parent::__construct($this->repository);
    }

    /**
     * @param int $test_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $test_id)
    {
        return $this->repository->getAllWithDescription($test_id);
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

