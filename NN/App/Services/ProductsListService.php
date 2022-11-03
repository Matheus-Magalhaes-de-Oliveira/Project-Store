<?php

namespace App\Services;



class ProductsListService {

    private $productsRepository;

    /**
     * 
     * @param \App\Repositories\IProductsRepository $productsRepository
     */
    public function __construct(\App\Repositories\IProductsRepository $productsRepository){
        $this->productsRepository = $productsRepository;
    }

    public function listProducts():array {
       return $this->productsRepository->listProducts();
    }

}

?>