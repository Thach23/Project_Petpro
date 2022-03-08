<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\ITagsRepository;
use App\Repositories\BaseRepository;
use App\Models\TAGS;

class TagsRepository extends BaseRepository implements ITagsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return TAGS::class;
    }
}
