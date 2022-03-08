<?php

namespace App\Services;

use App\Services\IService\IProductAttributeMappingsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductAttributeMappingsRepository;

class ProductAttributeMappingsService extends BaseService implements IProductAttributeMappingsService
{
    public function getRepository()
    {
        return IProductAttributeMappingsRepository::class;
    }
}
