<?php

namespace App\Repositories;

use stdClass;

class ProductsRepository implements IProductsRepository
{

    /**
     * 
     * @var mysqli
     */
    private $con;

    /**
     * 
     * @param \mysqli $con
     */

    public function __construct(\mysqli $con)
    {
        $this->con = $con;
    }

    public function create(string $imgUri, string $name, float $price, string $description, $categoriesId)
    {
        $name = addslashes($name);
        $price = addslashes($price);
        $created_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO products SET name = '{$name}', price = {$price}, 
        description = '{$description}', image = '{$imgUri}', created_at = '{$created_at}'";
        $this->con->query($sql);

        $sql = "SELECT LAST_INSERT_ID() AS product_id;";
        $this->con->query($sql);

        $result = $this->con->query($sql);
        $idProduct = $result->fetch_object()->product_id;

        foreach ($categoriesId as $categoryId) {

            $sql = "INSERT INTO products_categories (categories_id , products_id) VALUES ({$categoryId}, {$idProduct});";
            $this->con->query($sql);
        }

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function listProducts(): array
    {
        $sql = "SELECT p.id_products, p.image, p.name, GROUP_CONCAT(c.name) as categories, p.price, p.description, p.created_at 
        FROM products AS p 
        LEFT JOIN products_categories AS t ON t.products_id  = p.id_products
        LEFT JOIN categories AS c ON t.categories_id  = c.id_categories
        GROUP BY p.id_products 
        ORDER BY p.id_products DESC";

        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        $products = [];
        while ($product = $result->fetch_object()) {
            $products[] = $product;
        }

        return $products;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM products WHERE id_products  = " . (int)$id;

        $this->con->query($sql);


        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function get(int $id): stdClass
    {
        $sql = "SELECT * FROM products WHERE id_products  = " . (int)$id;

        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        if ($result->num_rows <= 0) {
            throw new \Exception("there is no product with id:{$id}");
        }

        return $result->fetch_object();
    }

    public function saveEdit(int $id, string $imgUri, string $name, float $price, string $description, $categoriesId)
    {
        $name = addslashes($name);
        $price = addslashes($price);

        $sql = "UPDATE products SET name = '{$name}', price = {$price}, 
        description = '{$description}', image = '{$imgUri}' WHERE id_products  = $id;";
        $this->con->query($sql);

        $sql = "DELETE FROM products_categories WHERE products_id = " . $id;
        $this->con->query($sql);

        foreach ($categoriesId as $categoryId) {

            $sql = "INSERT INTO products_categories (categories_id, products_id) VALUES ({$categoryId}, {$id});";
            $this->con->query($sql);
        }

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }
}
