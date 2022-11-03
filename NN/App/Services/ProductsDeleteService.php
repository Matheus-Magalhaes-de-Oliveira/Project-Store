<?php

namespace App\Services;



class ProductsDeleteService {

    private $productsRepository;

    /**
     * 
     * @param \App\Repositories\IProductsRepository $productsRepository
     */
    public function __construct(\App\Repositories\IProductsRepository $productsRepository){
        $this->productsRepository = $productsRepository;
    }

    public function delete(int $id){
       return $this->productsRepository->delete($id);
    }

}

?>