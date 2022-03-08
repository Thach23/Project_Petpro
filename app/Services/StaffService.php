<?php

namespace App\Services;

use App\Services\IService\IStaffService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IStaffRepository;

class StaffService extends BaseService implements IStaffService
{
    public function getRepository()
    {
        return IStaffRepository::class;
    }
}
