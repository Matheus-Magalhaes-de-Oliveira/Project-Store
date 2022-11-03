<?php

namespace App\Repositories;


interface IProductsRepository
{


    /** 
     * @param string $imgUri
     * @param string $name
     * @param float $price 
     * @param string $description
     * @param int $catogiriesId
     * @param int $idProducts

     */
    public function create(string $imgUri, string $name, float $price, string $description, $categoriesId);

    /**
     * 
     * @param int $id 
     * @param string $imgUri
     * @param string $name
     * @param float $price 
     * @param string $description
     * @param  $categoriesId
     */

    public function saveEdit(int $id, string $imgUri, string $name, float $price, string $description, $categoriesId);

    /** 
     * 
     * Function for listproduct
     */
    public function listProducts(): array;

    /**
     * 
     *@param int $id
     */
    public function delete(int $id);

    /**
     * 
     * @param int $id
     */
    public function get(int $id): \stdClass;
}
