<?php

namespace App\Repositories;

use stdClass;

class CategoriesRepository implements ICategoriesRepository{
    
    /**
     * 
     * @var mysqli
     */
    private $con;

    /**
     * 
     * @param \mysqli $con
     */
    public function __construct(\mysqli $con){
        $this->con = $con;
    }

    public function create(string $name){
        $name = addslashes($name);

        $sql = "INSERT INTO categories (name) VALUES ('{$name}')";

        $this->con->query($sql);

        if($this->con->error) {
            throw new \Exception($this->con->error);
        }
    }

    public function listCategories(): array {
        $sql = "SELECT * FROM categories";
        $result = $this->con->query($sql);

        if($this->con->error) {
            throw new \Exception($this->con->error);
        }

        $categories = [];

        while($category = $result->fetch_object()){
            $categories[] = $category;
        }

        return $categories;
    }

    public function delete(int $catId){
        $sql = "DELETE FROM categories WHERE id_categories = " . $catId;
        $this->con->query($sql);
        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function get(int $catId): stdClass{
        $sql = "SELECT * FROM categories WHERE id_categories =". (int)$catId;
        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
        
        if($result->num_rows <= 0){
            throw new \Exception("there is no categories with id:{$catId}");
        }

        return $result->fetch_object();
    }

    public function edit(int $catId, string $catName){    
        $catName = addslashes($catName);
        $catId = addslashes($catId);

        $sql = "UPDATE categories SET nome = '{$catName}' WHERE id_categories =" . $catId;
        $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

}

?>