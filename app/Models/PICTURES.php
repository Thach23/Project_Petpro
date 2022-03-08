<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PICTURES extends Model
{
    protected $table = 'Pictures';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Binary',
        'MineType',
        'Url',
        'Description',
        'IsDeleted'
    ];

    public function ProductPictureMappings()
    {
        return $this->hasMany(ProductPictureMappings::class, 'PictureId', 'Id');
    }
}
