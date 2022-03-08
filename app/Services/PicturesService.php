<?php

namespace App\Services;

use App\Services\IService\IPicturesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IPicturesRepository;

class PicturesService extends BaseService implements IPicturesService
{
    public function getRepository()
    {
        return IPicturesRepository::class;
    }
}
