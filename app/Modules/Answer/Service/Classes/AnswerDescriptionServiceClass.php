<?php

namespace App\Modules\Answer\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Answer\Repository\Interfaces\AnswerDescriptionInterface;
use App\Modules\Answer\Service\Interfaces\AnswerDescriptionServiceInterface;

class AnswerDescriptionServiceClass extends BaseServiceClass implements AnswerDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * AnswerServiceClass constructor.
     * @param AnswerDescriptionInterface $answerDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(AnswerDescriptionInterface $answerDescription)
    {
        $this->repository = $answerDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $answerId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $answerId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['answer' => $arr['answer_'.$language->key] ,'answer_id' => $answerId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $answerId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $answerId)
    {
        $descriptions = $this->repository->getWhere(['answer_id' => $answerId]);
        foreach($descriptions as $description)
        {
            $description->delete();
        }
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

