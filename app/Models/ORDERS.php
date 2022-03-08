<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ORDERS extends Model
{

    protected $table = 'Orders';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'CustomerName',
        'CustomerAddress',
        'CustomerPhone',
        'CustomerEmail',
        'OrderTotal',
        // 'TotalPayment',
        // 'Discount',
        'ProfileId',
        // 'Status',
        'Deleted',
        'DateCreated',
        'Note',
        // 'Temp_2',
        // 'Temp_3'
    ];

    public function OrderItems()
    {
        return $this->hasMany(OrderItems::class, 'OrderId', 'Id');
    }
}
