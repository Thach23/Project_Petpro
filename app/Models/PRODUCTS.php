<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRODUCTS extends Model
{
    protected $table = 'Products';

    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Description',
        'Slug',
        '[Content]',
        'Price',
        'OldPrice',
        'MetaKeywords',
        'MetaTitle',
        'MetaDescription',
        'NameEng',
        'DescEng',
        'ContentEng',
        'DateCreated',
        'LastEditedTime',
        'ProductCategoryId',
        'IsHomePage',
        'IsPublic',
        'Deleted',
        'Position',
        'Stock',
        'LikeProduct',
        'Tags',
        'UserCreate',
        'ProductImage'
    ];

    public function ProductPictureMappings()
    {
        return $this->hasMany(ProductPictureMappings::class, 'ProductId', 'Id');
    }
    public function OrderItems()
    {
        return $this->hasMany(OrderItems::class, 'ProductId', 'Id');
    }
    public function ProductAttributeMappings()
    {
        return $this->hasMany(ProductAttributeMappings::class, 'ProductId', 'Id');
    }
    public function ProductCategories()
    {
        return $this->belongsTo(ProductCategories::class, 'ProductCategoryId', 'Id');
    }
}
