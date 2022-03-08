<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WEBSITEATTRIBUTES extends Model
{
    protected $table = 'WebsiteAttributes';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Name',
        'Description',
        // 'LinkUrl',
        'Title',
        // 'Noted_1',
        // 'Noted_2',
        // 'Noted_3',
        'ControlType',
        'Type',
        'Value',
        'Value2',
        'Value3',
        'Temp1',
        'Temp2',
        'Temp3',
        'IsPublic',
        'Deleted',
        'isAvailable'
    ];
    public $timestamps = false;
}
