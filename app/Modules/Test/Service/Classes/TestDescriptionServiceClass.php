<?php

namespace App\Modules\Test\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Test\Repository\Interfaces\TestDescriptionInterface;
use App\Modules\Test\Service\Interfaces\TestDescriptionServiceInterface;

class TestDescriptionServiceClass extends BaseServiceClass implements TestDescriptionServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * TestServiceClass constructor.
     * @param TestDescriptionInterface $testDescription
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(TestDescriptionInterface $testDescription)
    {
        $this->repository = $testDescription;
        parent::__construct($this->repository);
    }

    /**
     * @param array $arr
     * @param int $testId
     * @author Nader Ahmed
     * @return boolean
     */
    public function StoreDescription(array $arr,int $testId)
    {
        $languages = get_languages();
        foreach($languages as $language)
        {
            $lang = ['title' => $arr['title_'.$language->key] ,'test_id' => $testId,'language_id' => $language->id];
            $this->repository->store($lang);
        }
        return true;
    }

    /**
     * @param int $testId
     * @author Nader Ahmed
     * @return boolean
     */
    public function DeleteDescriptions(int $testId)
    {
        $descriptions = $this->repository->getWhere(['test_id' => $testId]);
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

