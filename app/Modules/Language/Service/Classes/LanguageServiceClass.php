<?php

namespace App\Modules\Language\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Language\Repository\Interfaces\LanguageInterface;
use App\Modules\Language\Service\Interfaces\LanguageServiceInterface;

class LanguageServiceClass extends BaseServiceClass implements LanguageServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * LanguageServiceClass constructor.
     * @param LanguageInterface $language
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(LanguageInterface $language)
    {
        $this->repository = $language;
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

