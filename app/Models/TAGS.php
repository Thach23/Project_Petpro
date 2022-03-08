<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TAGS extends Model
{
    protected $table = 'Tags';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Deleted',
        'Slug',
        'isBlog',
    ];
}
