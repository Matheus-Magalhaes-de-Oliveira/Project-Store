<?php

namespace App\Services;



class ProductsGetService {

    private $productsRepository;

    /**
     * 
     * @param \App\Repositories\IProductsRepository $productsRepository
     */
    public function __construct(\App\Repositories\IProductsRepository $productsRepository){
        $this->productsRepository = $productsRepository;
    }

    public function get(int $id): object {
       return $this->productsRepository->get($id);
    }
}

?>