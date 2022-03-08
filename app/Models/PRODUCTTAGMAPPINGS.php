<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTTAGMAPPINGS extends Model
{
    protected $table = 'ProductTagMapping';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'ProductId',
        'TagId',
    ];
}
