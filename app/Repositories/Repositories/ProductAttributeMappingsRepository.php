<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductAttributeMappingsRepository;
use App\Repositories\BaseRepository;
use App\Models\PRODUCTATTRIBUTEMAPPINGS;

class ProductAttributeMappingsRepository extends BaseRepository implements IProductAttributeMappingsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PRODUCTATTRIBUTEMAPPINGS::class;
    }
}
