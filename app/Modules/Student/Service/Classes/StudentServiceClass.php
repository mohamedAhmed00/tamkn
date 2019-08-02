<?php

namespace App\Modules\Student\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\Student\Repository\Interfaces\StudentInterface;
use App\Modules\Student\Service\Interfaces\StudentServiceInterface;

class StudentServiceClass extends BaseServiceClass implements StudentServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * StudentServiceClass constructor.
     * @param StudentInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(StudentInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveStudent($request)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->storeWithImage($data,'student') : $this->storeWithOutImage($data);

    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function updateStudent($request,int $id)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->updateWithImage($id,$data,'student') : $this->updateWithoutImage($id,$data);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Students());
        return true;
    }
}

