<?php

namespace App\Services;

use App\Services\IService\IProductPictureMappingsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductPictureMappingsRepository;

class ProductPictureMappingsService extends BaseService implements IProductPictureMappingsService
{
    public function getRepository()
    {
        return IProductPictureMappingsRepository::class;
    }
}
