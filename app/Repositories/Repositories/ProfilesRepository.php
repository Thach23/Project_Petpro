<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProfilesRepository;
use App\Repositories\BaseRepository;
use App\Models\PROFILES;

class ProfilesRepository extends BaseRepository implements IProfilesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PROFILES::class;
    }
}
