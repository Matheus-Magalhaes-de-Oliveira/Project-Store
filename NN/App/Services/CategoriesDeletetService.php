<?php

namespace App\Services;

/**
 * Description of CategoriesDeletetService
 * 
 * 
 */
class CategoriesDeletetService{

    private $categoriesDeletetService;

    /**
     * 
     * @param \App\Repositories\ICategoriesRepository $categoriesRepository
     */
    public function __construct(\App\Repositories\ICategoriesRepository $categoriesDeletetService){
        $this->categoriesDeletetService = $categoriesDeletetService;
    }

    public function delete(int $catId){
       return $this->categoriesDeletetService->delete($catId);
    }
}
?>