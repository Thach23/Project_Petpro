<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IFilesRepository;
use App\Repositories\BaseRepository;
use App\Models\FILES;

class FilesRepository extends BaseRepository implements IFilesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return FILES::class;
    }
}
