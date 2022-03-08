<?php

namespace App\Services;

use App\Services\IService\IPetProfilesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IPetProfilesRepository;

class PetProfilesService extends BaseService implements IPetProfilesService
{
    public function getRepository()
    {
        return IPetProfilesRepository::class;
    }
}
