<?php

namespace App\Services;

use App\Services\IService\ICommentsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\ICommentsRepository;

class CommentsService extends BaseService implements ICommentsService
{
    public function getRepository()
    {
        return ICommentsRepository::class;
    }
}
