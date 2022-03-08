<?php

namespace App\Services;

use App\Services\IService\IDepartmentsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IDepartmentsRepository;

class DepartmentsService extends BaseService implements IDepartmentsService
{
    public function getRepository()
    {
        return IDepartmentsRepository::class;
    }
}
