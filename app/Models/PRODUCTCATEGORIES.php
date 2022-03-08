<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTCATEGORIES extends Model
{
    protected $table = 'ProductCategories';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Description',
        'Position',
        'Notes',
        'Slug',
        'Deleted',
    ];

    public function Products()
    {
        return $this->hasMany(Products::class, 'ProductCategoryId', 'Id');
    }
}
