<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BLOGCATEGORIES extends Model
{
    protected $table = 'BlogCategories';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Description',
        // 'Image',
        'Status',
        'Slug',
        'CategoryParentId',
        'Layout',
        'DisplayOrder',
        'IsStaticPage'
    ];

    public function BlogCategories()
    {
        return $this->hasMany(BlogCategories::class, 'CategoryParentId', 'Id');
    }
    public function Blogs()
    {
        return $this->hasMany(Blogs::class, 'BlogCategoryId', 'Id');
    }
    public function ProductCategories()
    {
        return $this->belongsTo(ProductCategories::class, 'CategoryParentId', 'Id');
    }
}
