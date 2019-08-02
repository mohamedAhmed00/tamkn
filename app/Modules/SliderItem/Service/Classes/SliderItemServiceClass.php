<?php

namespace App\Modules\SliderItem\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\SliderItem\Repository\Interfaces\SliderItemInterface;
use App\Modules\SliderItem\Service\Interfaces\SliderItemServiceInterface;

class SliderItemServiceClass extends BaseServiceClass implements SliderItemServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * SliderItemServiceClass constructor.
     * @param SliderItemInterface $sliderItem
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(SliderItemInterface $sliderItem)
    {
        $this->repository = $sliderItem;
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

