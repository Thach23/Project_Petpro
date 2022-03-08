<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BLOGTAGMAPPINGS extends Model
{
    protected $table = 'BlogTagMappings';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'BlogId',
        'TagId',
    ];
}
