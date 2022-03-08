<?php

namespace App\Repositories\IRepositories;

use App\Repositories\IBaseRepository;

interface IProductsRepository extends IBaseRepository
{
    public function getAllWithPicture($Id);
}
