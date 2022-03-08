<?php

namespace App\Services;

use App\Services\IService\IFilesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IFilesRepository;

class FilesService extends BaseService implements IFilesService
{
    public function getRepository()
    {
        return IFilesRepository::class;
    }
}
