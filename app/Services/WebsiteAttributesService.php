<?php

namespace App\Services;

use App\Services\IService\IWebsiteAttributesService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IWebsiteAttributesRepository;

class WebsiteAttributesService extends BaseService implements IWebsiteAttributesService
{
    public function getRepository()
    {
        return IWebsiteAttributesRepository::class;
    }
}
