<?php

namespace App\Services;

use App\Services\IService\IBlogsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IBlogsRepository;

class BlogsService extends BaseService implements IBlogsService
{
    public function getRepository()
    {
        return IBlogsRepository::class;
    }
}
