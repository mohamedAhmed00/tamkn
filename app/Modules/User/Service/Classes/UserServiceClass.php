<?php

namespace App\Modules\User\Service\Classes;

use App\Generic\Service\Classes\BaseServiceClass;
use App\Modules\User\Repository\Interfaces\UserInterface;
use App\Modules\User\Service\Interfaces\UserServiceInterface;

class UserServiceClass extends BaseServiceClass implements UserServiceInterface
{
    /**
     * @var
     */
    protected $repository;

    /**
     * UserServiceClass constructor.
     * @param UserInterface $category
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(UserInterface $category)
    {
        $this->repository = $category;
        parent::__construct($this->repository);
    }

    /**
     * @param int $roleId
     * @author Nader Ahmed
     * @return mixed
     */
    public function specificUser($roleId)
    {
       return  $this->repository->specificUser($roleId);
    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function saveUser($request)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->storeWithImage($data,'user') : $this->storeWithOutImage($data);

    }

    /**
     * @param $request
     * @author Nader Ahmed
     * @return void
     */
    public function updateUser($request,int $id)
    {
        $data = $request->all();
        if($request->has('password'))
        {
            $data['password'] = bcrypt($data['password']);
        }
        !empty($data['image'])? $this->updateWithImage($id,$data,'user') : $this->updateWithoutImage($id,$data);
    }

    /**
     * @param int $id
     * @author Nader Ahmed
     * @return boolean
     */
    public function canDelete(int $id)
    {
//        dd($this->repository->getById($id)->Users());
        return true;
    }
}

