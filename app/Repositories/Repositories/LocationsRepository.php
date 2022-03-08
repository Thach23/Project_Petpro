<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\ILocationsRepository;
use App\Repositories\BaseRepository;
use App\Models\LOCATIONS;

class LocationsRepository extends BaseRepository implements ILocationsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return LOCATIONS::class;
    }
}
