<?php

namespace App\Services;

use App\Services\IService\IProductTagMappingService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductTagMappingRepository;

class ProductTagMappingService extends BaseService implements IProductTagMappingService
{
    public function getRepository()
    {
        return IProductTagMappingRepository::class;
    }
}
