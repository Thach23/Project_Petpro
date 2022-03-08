<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BLOGS extends Model
{
    protected $table = 'Blogs';

    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Title',
        'TitleEng',
        'Slug',
        // 'BlogImage_Default',
        // 'BlogImage_Square',
        // 'BlogImage_Option',
        'BlogImage',
        'Description',
        'Content',
        'DescriptionEng',
        'ContentEng',
        'MetaKeywords',
        'MetaTitle',
        'MetaDescription',
        'IsAvailable',
        'IsHomePage',
        'Deleted',
        'DateCreated',
        'LastEditedTime',
        'PictureId',
        'BlogCategoryId',
        'Position',
        // 'UrlOrigin',
        'Tags',
        'ContentTwo',
        'Link',
        'ImageUrl',
        'BlogParentId',
    ];

    public function getRouteKeyName()
    {
        return 'Slug';
    }
    public function BlogCategories()
    {
        return $this->belongsTo(BlogCategories::class, 'BlogCategoryId', 'Id');
    }
}
