<?php

namespace App\Services;


class CategoriesEditService {
    
    private $categoriesRepository; 

    /**
     * 
     * @param \App\Repositories\ICategoriesRepository $categoriesRepository
     */
    function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
    }

    public function edit(int $catId, $catName){

        if(empty($catName)){
            throw new \Exception("invalid category name");
        }

        $this->categoriesRepository->edit($catId, $catName);
    }

}
