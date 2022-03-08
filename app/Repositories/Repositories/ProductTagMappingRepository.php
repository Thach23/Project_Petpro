<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductTagMappingRepository;
use App\Repositories\BaseRepository;
use App\Models\PRODUCTTAGMAPPINGS;

class ProductTagMappingRepository extends BaseRepository implements IProductTagMappingRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PRODUCTTAGMAPPINGS::class;
    }
}
