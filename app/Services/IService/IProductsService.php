<?php

namespace App\Services\IService;

interface IProductsService extends IBaseService
{
    public function getAllWithPicture($Id);
}
