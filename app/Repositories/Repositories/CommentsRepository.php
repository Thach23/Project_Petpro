<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\ICommentsRepository;
use App\Repositories\BaseRepository;
use App\Models\COMMENTS;

class CommentsRepository extends BaseRepository implements ICommentsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return COMMENTS::class;
    }
}
