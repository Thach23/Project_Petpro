<?php

namespace App\Services;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Cookie;

use App\Services\IService\IOrdersService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IOrdersRepository;
use App\Repositories\IRepositories\IOrderItemsRepository;
use App\Repositories\IRepositories\IProductsRepository;

class OrdersService extends BaseService implements IOrdersService
{
    protected $_productRepo;
    protected $_orderitemsRepo;
    public function __construct(IOrdersRepository $orderRepo, IProductsRepository $productRepo, IOrderItemsRepository $orderitemrepo)
    {
        $this->repository = $orderRepo;
        $this->_productRepo = $productRepo;
        $this->_orderitemsRepo = $orderitemrepo;
    }

    public function GetCartInfo($myCart)
    {
        $carts = array();
        foreach ($myCart as $cart) {
            $carts[$cart['id']] = $this->_productRepo->find($cart['id']);
            $carts[$cart['id']]['quantity'] = $cart['quantity'];
        }

        return $carts;
    }

    public function SaveOrder($customerName, $customerAddress, $customerPhone, $customerEmail, $total, $note, $carts, $discount, $userid = null)
    {
        $datetime = Date::now();
        $datetime_formatted = date_format($datetime, 'Y-m-d H:i:s');
        $data = [
            'CustomerName' => $customerName,
            'CustomerAddress' => $customerAddress,
            'CustomerPhone' => $customerPhone,
            'CustomerEmail' => $customerEmail,
            'OrderTotal' => $total,
            'DateCreated' => $datetime_formatted,
            'Deleted' => false,
            'Note' => $note,
            'ProfileId' => $userid,
        ];
        $order = $this->create($data);

        foreach ($carts as $cart) {
            $carts[$cart['id']] = $this->_productRepo->find($cart['id']);
            $carts[$cart['id']]['quantity'] = $cart['quantity'];
        }

        $orderitems = array();
        foreach ($carts as $cart) {
            $orderitem = $this->_orderitemsRepo->create([
                'OrderId' => $order['Id'],
                'ProductId' => $cart['Id'],
                'Quantity' => $cart['quantity'],
                'Price' => $cart['Price'],
                'Discount' => $discount,
            ]);
            array_push($orderitems, $orderitem);
        }

        Cookie::queue(Cookie::forget('cart'));

        return [$order, $orderitems];
    }

    public function getRepository()
    {
        return IOrdersRepository::class;
    }
}
