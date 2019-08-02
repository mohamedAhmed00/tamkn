<?php

namespace App\Generic\Service\Classes;

use App\Generic\Repository\Interfaces\BaseInterface;
use App\Generic\Service\Interfaces\BaseServiceInterface;
use App\Generic\Traits\FileUpload;

class BaseServiceClass implements BaseServiceInterface
{
    use FileUpload;
    /**
     * @var
     */
    protected $repository;

    public function __construct(BaseInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function storeWithOutImage($data)
    {
        return $this->store($data);
    }

    /**
     * @param $data
     * @param string $path
     * @auther Nader Ahmed
     * @return mixed
     */
    public function storeWithImage($data,$path = "")
    {
        $data['image'] = $this->imageUpload($data['image'],$path);
        return $this->store($data);
    }
    /**
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    private function store($data)
    {
        return $this->repository->store($data);
    }

    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->repository->getById($id);
    }

    /**
     * @param $data
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function updateWithoutImage(int $id,$data)
    {
        $this->update($data,$id);
    }

    /**
     * @param $data
     * @param int $id
     * @param string $path
     * @auther Nader Ahmed
     * @return mixed
     */
    public function updateWithImage(int $id,$data,string $path)
    {
        $object = $this->getById($id);
        if(!empty($object->image))
        {
            $this->removeImageFromDisk($object->image);
        }
        $data['image'] = $this->imageUpload($data['image'],$path);
        return $this->update($data,$id);
    }
    /**
     * @param $data
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    private function update($data,$id)
    {
        return $this->repository->update($id,$data);
    }
    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return int
     */
    public function getCount(array $where = null)
    {

        return $this->repository->getCount($where);
    }

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getWhere(array $where = null)
    {
        return $this->repository->getWhere($where);
    }

}
