<?php

namespace App\Services;

use App\Services\IService\IProductAttributesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductAttributesRepository;

class ProductsAttributesService extends BaseService implements IProductAttributesService
{
    public function getRepository()
    {
        return IProductAttributesRepository::class;
    }
}
