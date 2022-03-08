<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IBlogsRepository;
use App\Repositories\BaseRepository;
use App\Models\BLOGS;

class BlogsRepository extends BaseRepository implements IBlogsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return BLOGS::class;
    }


}
