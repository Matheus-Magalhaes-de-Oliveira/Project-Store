<?php

namespace App\Services;



class CategoriesListService{

    private $categoriesRepository;

    /**
     * 
     * @param \App\Repositories\ICategoriesRepository $categoriesRepository
     */
    public function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
        
    }

    public function listCategories():array{
        return $this->categoriesRepository->listCategories();
    }
}
?>