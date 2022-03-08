<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IRecruitsRepository;
use App\Repositories\BaseRepository;
use App\Models\RECRUITS;

class RecruitsRepository extends BaseRepository implements IRecruitsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return RECRUITS::class;
    }
}
