<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductCategoriesRepository;
use App\Repositories\BaseRepository;
use App\Models\ProductCategories;

class ProductCategoriesRepository extends BaseRepository implements IProductCategoriesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return ProductCategories::class;
    }

    public function GetProducts()
    {
        return $this->model->with('Products')->get();
    }
}
