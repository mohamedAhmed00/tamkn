<?php

namespace App\Modules\Document\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Document\Repository\Interfaces\DocumentInterface;
use App\Modules\Document\Service\Interfaces\DocumentServiceInterface;

class DocumentServiceClass extends BaseServiceClass implements DocumentServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * DocumentServiceClass constructor.
     * @param DocumentInterface $document
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(DocumentInterface $document)
    {
        $this->repository = $document;
        parent::__construct($this->repository);
    }

    /**
     * @param int $lesson_id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllWithDescription(int $lesson_id)
    {
        return $this->repository->getAllWithDescription($lesson_id);
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

