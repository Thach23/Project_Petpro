<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTRELATIONSHIPS extends Model
{
    protected $table = 'ProductRelationships';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'ProductRelateId',
        'ProductId',
        'isAvailable'
    ];
    public $timestamps = false;
}
