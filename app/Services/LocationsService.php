<?php

namespace App\Services;

use App\Services\IService\ILocationsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\ILocationsRepository;

class LocationsService extends BaseService implements ILocationsService
{
    public function getRepository()
    {
        return ILocationsRepository::class;
    }
}
