<?php

namespace App\Modules\Page\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Page\Repository\Interfaces\PageInterface;
use App\Modules\Page\Service\Interfaces\PageServiceInterface;

class PageServiceClass extends BaseServiceClass implements PageServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * PageServiceClass constructor.
     * @param PageInterface $page
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(PageInterface $page)
    {
        $this->repository = $page;
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

