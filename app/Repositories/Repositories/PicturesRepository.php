<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IPicturesRepository;
use App\Repositories\BaseRepository;
use App\Models\PICTURES;

class PicturesRepository extends BaseRepository implements IPicturesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PICTURES::class;
    }
}
