<?php

namespace App\Repositories;

interface IBaseRepository
{
    /**
     * Get all
     * @return mixed
     */
    function getAll($rownum = 0, $skip = 0, $columns = ['*']);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    function delete($id);

    /**
     * Delete
     * @param $rownum
     * @return page collection
     */
    function paginate($rownum);

    /**
     * Delete
     * @param $conditions,$rownum
     * @return collection
     */
    public function Query($conditions = [], $rownum = 0, $paginate = 0);
}
