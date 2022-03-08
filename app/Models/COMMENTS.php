<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class COMMENTS extends Model
{
    protected $table = 'Comments';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'BlogId',
        'UserId',
        'UserName',
        'Content',
        'Deleted',
        'DateCreate',
        'CommentID',
        'isBlog'
    ];
}
