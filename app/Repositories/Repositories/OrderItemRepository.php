<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IOrderItemRepository;
use App\Repositories\BaseRepository;
use App\Models\ORDERITEMS;

class OrderItemRepository extends BaseRepository implements IOrderItemRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return ORDERITEMS::class;
    }
}
