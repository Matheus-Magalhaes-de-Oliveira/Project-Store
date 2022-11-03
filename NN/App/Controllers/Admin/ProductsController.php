<?php

namespace App\Controllers\Admin;

class ProductsController extends \App\Controllers\Abstracts\BaseController
{

    /**
     * products form . create
     */
    public function create()
    {

        $categoriesListRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
        $categoriesListService = new \App\Services\CategoriesListService($categoriesListRepository);
        $categories = $categoriesListService->listCategories();

        $data['page'] = "Admin/productCreateView";
        $data['categories'] = $categories;
        $this->view("Admin/indexView", $data);
    }

    /**
     * 
     * recieve information form products and perform it on database
     */
    public function saveCreate()
    {
        $image = $_FILES['image'];
        $name = $_POST['nome'];
        $categoriesId = isset ($_POST['categories']) ? $_POST['categories']: [];
        $price = (float) $_POST['price'];
        $description = $_POST['description'];

        $productsRepository = new \App\Repositories\ProductsRepository(\App\Db\Conection::getConection());
        $uploadService = new \App\Services\UploadsService();

        try {

            $productCreateService = new \App\Services\ProductsCreateService($productsRepository, $uploadService);
            $productCreateService->create($image['name'], $image['tmp_name'], $name, $price, $description, $categoriesId);

            $categoriesListRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
            $categoriesId = new \App\Services\CategoriesListService($categoriesListRepository);

            header("Location: " . \App\Config\Config::url("admin/products/list-products"));
        } catch (\Exception $e) {
            echo "Error on create product: " . $e->getMessage();
        }
    }

    public function listProducts()
    {
        $productsRepository = new \App\Repositories\ProductsRepository(\App\Db\Conection::getConection());
        $productListService = new \App\Services\ProductsListService($productsRepository);
        $products = $productListService->listProducts();;

        $data['products'] = $products;
        $data['page'] = "Admin/productsListView";
        $this->view("Admin/indexView", $data);
    }

    public function delete()
    {
        $produtoId = $_GET['id'];

        try {
            $productsRepository = new \App\Repositories\ProductsRepository(\App\Db\Conection::getConection());
            $productDeleteService = new \App\Services\ProductsDeleteService($productsRepository);
            $productDeleteService->delete($produtoId);
            header("Location: " . \App\Config\Config::url("admin/products/list-products"));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit()
    {
        $produtoId = $_GET['id'];
        
        $productsRepository = new \App\Repositories\ProductsRepository(\App\Db\Conection::getConection());
        $productGetService = new \App\Services\ProductsGetService($productsRepository);
        $product = $productGetService->get($produtoId);

        $categoriesListRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
        $categoriesListService = new \App\Services\CategoriesListService($categoriesListRepository);
        $categories = $categoriesListService->listCategories();

        $data['categories'] = $categories;        
        $data['product'] = $product;
        $data['page'] = "Admin/productEditView";
        $this->view("Admin/indexView", $data);
    }

    public function saveEdit()
    {
        $categoriesId = isset ($_POST['categories']) ? $_POST['categories']: [];
        $productId = (int) $_GET['id'];
        $image = $_FILES['image'];
        $name = $_POST['nome'];
        $price = (float) $_POST['price'];
        $description = $_POST['description'];

        $productsRepository = new \App\Repositories\ProductsRepository(\App\Db\Conection::getConection());
        $uploadService = new \App\Services\UploadsService;
        $productGetService = new \App\Services\ProductsGetService($productsRepository);

        try {
            $productEditService = new \App\Services\ProductsEditService($productsRepository, $uploadService, $productGetService);
            $productEditService->edit($productId, $image['name'], $image['tmp_name'], $name, $price, $description, $categoriesId);

            header("Location: " . \App\Config\Config::url("admin/products/list-products"));
        } catch (\Exception $e) {
            echo "Error on create product: " . $e->getMessage();
        }
    }
}
