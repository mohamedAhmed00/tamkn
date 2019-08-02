<?php

namespace App\Modules\Category\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Category\Repository\Interfaces\CategoryInterface;
use App\Modules\Category\Service\Interfaces\CategoryServiceInterface;

class CategoryServiceClass extends BaseServiceClass implements CategoryServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * CategoryServiceClass constructor.
     * @param CategoryInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(CategoryInterface $category)
    {
        $this->repository = $category;
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

