<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductAttributesRepository;
use App\Repositories\BaseRepository;
use App\Models\PRODUCTATTRIBUTES;

class ProductAttributesRepository extends BaseRepository implements IProductAttributesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PRODUCTATTRIBUTES::class;
    }
}
