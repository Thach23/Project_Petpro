<?php

namespace App\Services;

use App\Services\IService\ITagsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\ITagsRepository;

class TagsService extends BaseService implements ITagsService
{
    public function getRepository()
    {
        return ITagsRepository::class;
    }
}
