<?php

namespace App\Repositories;

use App\Repositories\IBaseRepository;

abstract class BaseRepository implements IBaseRepository
{
    //model muốn tương tác
    protected $model;


    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    function getAll($rownum = 0, $skip = 0, $columns = ['*'])
    {
        // if ($this->model->has('Deleted')) {
        //     return $this->model::where('Deleted',0)->offset($skip)->limit($rownum)->get($columns);
        // }        
        return $this->model::offset($skip)->limit($rownum)->get($columns);
    }

    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->firstOrCreate($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function paginate($rownum)
    {
        return $this->model->paginate($rownum);
    }

    public function Query($conditions = [], $rownum = 0, $paginate = 0)
    {
        if ($paginate != 0) {
            return $this->model->where($conditions)->limit($rownum)->paginate($paginate);
        }
        return $this->model->where($conditions)->limit($rownum)->get();
    }
}
