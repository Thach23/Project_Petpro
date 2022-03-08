<?php

namespace App\Services;

use App\Services\IService\IBaseService;

abstract class BaseService implements IBaseService
{
    //model muốn tương tác
    protected $repository;
    //khởi tạo
    public function __construct()
    {
        $this->setRepository();
    }
    //lấy model tương ứng
    abstract public function getRepository();
    /**
     * Set model
     */
    public function setRepository()
    {
        $this->repository = app()->make(
            $this->getRepository()
        );
    }
    function getAll($rownum = 0, $skip = 0, $columns = ['*'])
    {
        return $this->repository->getAll($rownum, $skip, $columns);
    }
    function find($id)
    {
        return $this->repository->find($id);
    }
    function create($attributes = [])
    {
        return $this->repository->create($attributes);
    }
    function update($id, $attributes = [])
    {
        return $this->repository->update($id, $attributes);
    }
    function delete($id)
    {
        return $this->repository->delete($id);
    }
    function paginate($rownum)
    {
        return $this->repository->paginate($rownum);
    }
    function query($conditions = [], $rownum = 0, $paginate = 0)
    {
        return $this->repository->Query($conditions, $rownum, $paginate);
    }
}
