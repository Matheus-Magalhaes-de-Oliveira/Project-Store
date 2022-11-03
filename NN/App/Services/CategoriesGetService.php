<?php

namespace App\Services;



class CategoriesGetService {
    private $categoriesRepository;

    /**
     * 
     * @param \App\Repositories\ICategoriesRepository $categoriesRepository
     */
    public function __construct(\App\Repositories\ICategoriesRepository $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
    }

    public function get(int $catId): object {
       return $this->categoriesRepository->get($catId);
    }
}