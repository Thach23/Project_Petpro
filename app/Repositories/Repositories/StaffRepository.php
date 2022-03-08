<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IStaffRepository;
use App\Repositories\BaseRepository;
use App\Models\STAFFS;

class StaffRepository extends BaseRepository implements IStaffRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return STAFFS::class;
    }
}
