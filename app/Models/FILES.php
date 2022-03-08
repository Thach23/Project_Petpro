<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FILES extends Model
{
    protected $table = 'Files';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Phone',
        'PathFile',
        'BlogName',
        'BlogId',
        'Email'
    ];
}
