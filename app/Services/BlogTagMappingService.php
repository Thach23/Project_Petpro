<?php

namespace App\Services;

use App\Services\IService\IBlogTagMappingService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IBlogTagMappingRepository;

class BlogTagMappingService extends BaseService implements IBlogTagMappingService
{
    public function getRepository()
    {
        return IBlogTagMappingRepository::class;
    }
}
