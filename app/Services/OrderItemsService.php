<?php

namespace App\Services;

use App\Services\IService\IOrderItemsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IOrderitemsRepository;

class OrderItemsService extends BaseService implements IOrderItemsService
{
    public function getRepository()
    {
        return IOrderitemsRepository::class;
    }
}
