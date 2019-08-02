<?php

namespace App\Modules\Answer\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Answer\Repository\Interfaces\AnswerInterface;
use App\Modules\Answer\Service\Interfaces\AnswerServiceInterface;

class AnswerServiceClass extends BaseServiceClass implements AnswerServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * AnswerServiceClass constructor.
     * @param AnswerInterface $answer
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(AnswerInterface $answer)
    {
        $this->repository = $answer;
        parent::__construct($this->repository);
    }

    /**
     * @param int $question_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $question_id)
    {
        return $this->repository->getAllWithDescription($question_id);
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

