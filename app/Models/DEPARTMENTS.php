<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DEPARTMENTS extends Model
{
    protected $table = 'Departments';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Unit',
        'Name',
        'Description',
        'Deleted',
        'Temp_1',
        'Temp_2',
        'Temp_3',
        'Temp_4',
        'Temp_5',
        'Temp_6',
        'Temp_7',
        'Temp_8',
        'Temp_9',
        'Temp_10'
    ];
}
