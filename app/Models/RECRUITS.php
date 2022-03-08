<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RECRUITS extends Model
{
    protected $table = 'Recruits';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Title',
        'Description',
        'Content',
        'DayStart',
        'DayEnd',
        'LocationId',
        'DepartmentId',
        'Temp_1',
        'Temp_2',
        'Temp_3',
        'Temp_4',
        'Temp_5',
        'Deleted',
    ];
}
