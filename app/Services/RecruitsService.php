<?php

namespace App\Services;

use App\Services\IService\IRecruitsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IRecruitsRepository;

class RecruitsService extends BaseService implements IRecruitsService
{
    public function getRepository()
    {
        return IRecruitsRepository::class;
    }
}
