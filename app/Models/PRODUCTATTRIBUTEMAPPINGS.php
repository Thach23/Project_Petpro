<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTATTRIBUTEMAPPINGS extends Model
{
    protected $table = 'ProductAttributemappings';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Value',
        'IsRequired',
        'DisplayOrder',
        'ProductId',
        'ProductAttributeId',
        'Price',
        'OldPrice',
        'Temp_1',
        'Temp_2',
        'Stock'

    ];
    public function Products()
    {
        return $this->belongsTo(Products::class, 'ProductId', 'Id');
    }
    public function ProductAttributes()
    {
        return $this->belongsTo(ProductAttributes::class, 'ProductAttributeId', 'Id');
    }
}
