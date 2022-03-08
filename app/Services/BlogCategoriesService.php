<?php

namespace App\Services;

use App\Services\IService\IBlogCategoriesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IBlogCategoriesRepository;

class BlogCategoriesService extends BaseService implements IBlogCategoriesService
{
    public function getRepository()
    {
        return IBlogCategoriesRepository::class;
    }
}
