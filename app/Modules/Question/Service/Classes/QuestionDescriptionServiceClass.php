<?php

namespace App\Modules\Question\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Question\Repository\Interfaces\QuestionDescriptionInterface;
use App\Modules\Question\Service\Interfaces\QuestionDescriptionServiceInterface;

class QuestionDescriptionServiceClass extends BaseServiceClass implements QuestionDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * QuestionServiceClass constructor.
     * @param QuestionDescriptionInterface $questionDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(QuestionDescriptionInterface $questionDescription)
    {
        $this->repository = $questionDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $questionId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $questionId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['question' => $arr['question_'.$language->key] ,'question_id' => $questionId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $questionId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $questionId)
    {
        $descriptions = $this->repository->getWhere(['question_id' => $questionId]);
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

