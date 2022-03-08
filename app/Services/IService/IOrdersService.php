<?php

namespace App\Services\IService;

interface IOrdersService extends IBaseService
{
    function SaveOrder($customerName, $customerAddress, $customerPhone, $customerEmail, $total, $note, $carts, $discount, $userid = null);
    function GetCartInfo($myCart);
}
