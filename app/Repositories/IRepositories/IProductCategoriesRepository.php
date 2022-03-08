<?php

namespace App\Repositories\IRepositories;

use App\Repositories\IBaseRepository;

interface IProductCategoriesRepository extends IBaseRepository
{
    function GetProducts();
}
