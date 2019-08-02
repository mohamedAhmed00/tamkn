<?php

namespace App\Generic\Repository\Eloquent;

use App\Generic\Repository\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Eloquent;


class BaseEloquent implements BaseInterface
{

    /**
    * @var
    */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->orderBy('created_at','DESC')->get();
    }

    /**
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function update(int $id,$data)
    {
       return $this->getById($id)->update($data);
    }

    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return int
     */
    public function getCount(array $where = null)
    {
        return $this->model->where($where)->count();
    }

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getWhere(array $where = null)
    {
        return $this->model->where($where)->get();
    }
}
