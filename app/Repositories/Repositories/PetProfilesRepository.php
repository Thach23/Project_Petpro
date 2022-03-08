<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IPetProfilesRepository;
use App\Repositories\BaseRepository;
use App\Models\PETPROFILES;

class PetProfilesRepository extends BaseRepository implements IPetProfilesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PETPROFILES::class;
    }
}
