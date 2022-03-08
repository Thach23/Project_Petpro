<?php

namespace App\Services;

use App\Services\IService\IOrderItemService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IOrderItemRepository;

class OrderItemService extends BaseService implements IOrderItemService
{
    public function getRepository()
    {
        return IOrderItemRepository::class;
    }
}
