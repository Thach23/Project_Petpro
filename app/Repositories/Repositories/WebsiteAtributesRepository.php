<?php

namespace App\Repositories\Repositories;

use App\Repositories\IRepositories\IWebsiteAttributesRepository;
use App\Repositories\BaseRepository;
use App\Models\WEBSITEATTRIBUTES;

class WebsiteAtributesRepository extends BaseRepository implements IWebsiteAttributesRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return WEBSITEATTRIBUTES::class;
    }
}
