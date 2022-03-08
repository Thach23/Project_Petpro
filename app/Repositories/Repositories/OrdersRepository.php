<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IOrdersRepository;
use App\Repositories\BaseRepository;
use App\Models\ORDERS;

class OrdersRepository extends BaseRepository implements IOrdersRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return ORDERS::class;
    }
}
