<?php

namespace App\Services;

use App\Services\IService\IProductsService;
use App\Services\BaseService;

use App\Repositories\IRepositories\IProductsRepository;
use App\Repositories\IRepositories\IProductAttributesRepository;

class ProductsService extends BaseService implements IProductsService
{
    public $_proattRepo;
    public function __construct(IProductsRepository $mainrepo, IProductAttributesRepository $proattRepo)
    {
        $this->_proattRepo = $proattRepo;
        $this->repository = $mainrepo;
        //$this->setRepository();
    }
    public function getRepository()
    {
        return IProductsRepository::class;
    }

    public function getAllWithPicture($Id)
    {
        return $this->repository->getAllWithPicture($Id);
    }
}
