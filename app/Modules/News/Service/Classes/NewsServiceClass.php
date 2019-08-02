<?php

namespace App\Modules\News\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\News\Repository\Interfaces\NewsInterface;
use App\Modules\News\Service\Interfaces\NewsServiceInterface;

class NewsServiceClass extends BaseServiceClass implements NewsServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * NewsServiceClass constructor.
     * @param NewsInterface $news
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(NewsInterface $news)
    {
        $this->repository = $news;
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

