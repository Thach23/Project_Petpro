<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IBlogTagMappingRepository;
use App\Repositories\BaseRepository;
use App\Models\BLOGTAGMAPPINGS;

class BlogTagMappingRepository extends BaseRepository implements IBlogTagMappingRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return BLOGTAGMAPPINGS::class;
    }
}
