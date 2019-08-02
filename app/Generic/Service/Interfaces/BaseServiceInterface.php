<?php

namespace App\Generic\Service\Interfaces;

interface BaseServiceInterface
{
    /**
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getAll();

    /**
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function storeWithOutImage($data);

    /**
     * @param $data
     * @param $path
     * @auther Nader Ahmed
     * @return mixed
     */
    public function storeWithImage($data,$path);

    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param int $id
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function updateWithoutImage(int $id,$data);

    /**
     * @param int $id
     * @param string $path
     * @param $data
     * @auther Nader Ahmed
     * @return mixed
     */
    public function updateWithImage(int $id,$data,string $path);

    /**
     * @param int $id
     * @auther Nader Ahmed
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return int
     */
    public function getCount(array $where = null);

    /**
     * @param array $where = null
     * @auther Nader Ahmed
     * @return mixed
     */
    public function getWhere(array $where = null);
}
