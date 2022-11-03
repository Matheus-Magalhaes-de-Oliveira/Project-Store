<?php

namespace App\Controllers\Admin;


class CategoriesController extends \App\Controllers\Abstracts\BaseController{

    /**
     * category form . create 
     */
    public function create (){
        $data['page'] = "Admin/categoriesCreateView";
        $this->view("Admin/indexView", $data);
    }

    /**
     * recieve information form category and perform it on database
     */
    public function saveCreate(){
        $name = $_POST['name'];

        $categoriesRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());

        try{
            $categoriesCreateService = new \App\Services\CategoriesCreateService($categoriesRepository);
            $categoriesCreateService->create($name);
            
            header("Location:" . \App\Config\Config::url('/admin/categoires/list-categories'));

        } catch (\Exception $e){
            echo "Error on create categories: " . $e->getMessage();
        }
    }

    public function listCategories() {

    $categoriesListRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
    $categoriesListService = new \App\Services\CategoriesListService($categoriesListRepository);

    $categories = $categoriesListService->listCategories();

    $data['page'] = "Admin/categoriesListView";
    $data['categories'] = $categories;
    $this->view("Admin/indexView", $data);
    }

    public function delete(){
        $catId = $_GET['id']; 

        try{

        $categoriesRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
        $categoriesDeletetService = new \App\Services\CategoriesDeletetService($categoriesRepository);

        $categoriesDeletetService->delete($catId);

        header("Location: " . \App\Config\Config::url("/admin/categoires/list-categories"));

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function edit(){
        $catId = (int)$_GET['id']; 

        $categoriesRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());
        $categoriesGetService = new \App\Services\CategoriesGetService($categoriesRepository);

        $categories = $categoriesGetService->get($catId);

        $data['categories'] = $categories;
        $data['page'] = "Admin/categoriesEditView";
        $this->view("Admin/indexView", $data);
    }
 
    public function saveEdit(){
        $catId = (int)$_GET['id']; 
        $catName = $_POST['name'];

        $categoriesRepository = new \App\Repositories\CategoriesRepository(\App\Db\Conection::getConection());

        try{
            $categoriesEditService = new \App\Services\CategoriesEditService($categoriesRepository);
            $categoriesEditService->edit($catId, $catName);

            header("Location:" . \App\Config\Config::url('/admin/categoires/list-categories'));

        } catch (\Exception $e){
            echo "Error on create categories: " . $e->getMessage();
        }
    }
}
