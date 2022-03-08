<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTATTRIBUTES extends Model
{
    protected $table = 'ProductAttributes';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Description',
        'ControlType',
        'Deleted',
        'Image'

    ];
    public function ProductAttributeMappings()
    {
        return $this->hasMany(ProductAttributeMappings::class, 'ProductAttributeId', 'Id');
    }
}
