<?php

namespace App\Services;

use App\Services\IService\IProductCategoriesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductCategoriesRepository;

class ProductCategoriesService extends BaseService implements IProductCategoriesService
{
    public function getRepository()
    {
        return IProductCategoriesRepository::class;
    }

    public function GetProducts()
    {
        return $this->repository->GetProducts();
    }
}
