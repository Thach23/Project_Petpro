<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTPICTUREMAPPINGS extends Model
{
    protected $table = 'ProductPictureMappings';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Title',
        'DisplayOrder',
        'IsMainPicture',
        'ProductId',
        'PictureId',
    ];
    public $timestamps = false;

    public function Products()
    {
        return $this->belongsTo(Products::class, 'ProductId', 'Id');
    }
    public function Pictures()
    {
        return $this->belongsTo(Pictures::class, 'PictureId', 'Id');
    }
}
