<?php

namespace App\Modules\Slider\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Slider\Repository\Interfaces\SliderInterface;
use App\Modules\Slider\Service\Interfaces\SliderServiceInterface;

class SliderServiceClass extends BaseServiceClass implements SliderServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * SliderServiceClass constructor.
     * @param SliderInterface $slider
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(SliderInterface $slider)
    {
        $this->repository = $slider;
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

