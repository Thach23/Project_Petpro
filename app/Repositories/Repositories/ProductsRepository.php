<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IProductsRepository;
use App\Repositories\BaseRepository;
use App\Models\PRODUCTS;

class ProductsRepository extends BaseRepository implements IProductsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return PRODUCTS::class;
    }

    //override
    public final function getAll($rownum = 0, $skip = 0, $columns = ['*'])
    {
        // dd($this->model->with('ProductCategories')->get());
        return $this->model
            ->where('Deleted', !1)
            ->offset($skip)
            ->limit($rownum)
            ->get($columns);
    }

    public function getAllWithPicture($Id)
    {
        $product = $this->model->find($Id);
        if (!isset($product)) {
            return null;
        }

        $data = $this->model
            ->join('ProductPictureMappings', 'ProductPictureMappings.ProductId', '=', 'Products.Id')
            ->join('Pictures', 'Pictures.Id', '=', 'ProductPictureMappings.PictureId')
            ->where('ProductId', $Id)
            ->select()
            ->get();
        return $data;
    }
}
