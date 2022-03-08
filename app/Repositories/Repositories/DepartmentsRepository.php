<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IDepartmentsRepository;
use App\Repositories\BaseRepository;
use App\Models\DEPARTMENTS;

class DepartmentsRepository extends BaseRepository implements IDepartmentsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return DEPARTMENTS::class;
    }
}
