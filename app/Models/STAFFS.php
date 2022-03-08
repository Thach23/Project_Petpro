<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STAFFS extends Model
{
    protected $table = 'Staffs';

    protected $primaryKey = 'Id';
    public $timestamps = false;
    // //test
    // protected $keyType = 'int';
    // public $incrementing = true;
    // public $timestamps = false;
    // protected $dateFormat = 'd-m-Y';

    // //test

    protected $fillable = [
        'Name',
        'Phone',
        'Image',
        'Rename',
        'Description',
        'Type',
        'Deleted',
        'Yahoo',
        'skype'
    ];
}
