<?php

namespace App\Repositories;


interface ICategoriesRepository{

    /**
     * 
     * @param string $name
     */
    public function create(string $name);

    public function listCategories(): array;

    /**
     * 
     * @param int $catId
     */
    public function delete(int $catId);

    /**
     * 
     * @param int $catId
     */
    public function get(int $catId): \stdClass;

    /**
     * 
     * @param int $catId
     */
    public function edit (int $catId, string $catName);

}