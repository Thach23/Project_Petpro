<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IOrderItemsRepository;
use App\Repositories\BaseRepository;
use App\Models\ORDERITEMS;

class OrderItemsRepository extends BaseRepository implements IOrderItemsRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return ORDERITEMS::class;
    }
}
