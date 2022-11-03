<?php

namespace App\Services;

use App\Services\UploadsService;

class CategoriesCreateService {
    private $categoriesRepository ; 


    function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
        
    }

    public function create($name){

        if(empty($name)){
            throw new \Exception("invalid categoires name");
        }

        $this->categoriesRepository->create($name);
    }

}

?>