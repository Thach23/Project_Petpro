<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ORDERITEMS extends Model
{
    protected $table = 'OrderItems';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'OrderId',
        'ProductId',
        'Quantity',
        'Price',
        'Discount',
        'AttributeId',
        'AttributeName',
        'Temp_1',
        'Temp_2',
        'Temp_3',
    ];

    public function Orders()
    {
        return $this->belongsTo(Orders::class, 'OrderId', 'Id');
    }
    public function Products()
    {
        return $this->belongsTo(Products::class, 'ProductId', 'Id');
    }
}
