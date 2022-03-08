<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IBlogCategoriesRepository;
use App\Repositories\BaseRepository;
use App\Models\BLOGCATEGORIES;

class BlogCategoriesRepository extends BaseRepository implements IBlogCategoriesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return BLOGCATEGORIES::class;
    }
}
