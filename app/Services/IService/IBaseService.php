<?php

namespace App\Services\IService;

interface IBaseService
{
    function getAll($rownum = 0, $skip = 0, $columns = []);
    function find($id);
    function create($attributes = []);
    function update($id, $attributes = []);
    function delete($id);
    function paginate($rownum);
    function Query($conditions = [], $rownum = 0, $paginate = 0);
}
