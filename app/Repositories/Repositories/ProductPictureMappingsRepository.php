<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductPictureMappingsRepository;
use App\Repositories\BaseRepository;
use App\Models\PRODUCTPICTUREMAPPINGS;

class ProductPictureMappingsRepository extends BaseRepository implements IProductPictureMappingsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PRODUCTPICTUREMAPPINGS::class;
    }
}
