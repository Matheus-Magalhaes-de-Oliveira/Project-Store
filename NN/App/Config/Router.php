<?php

namespace App\Config;

use App\Controllers\Admin\CategoriesController;

class Router
{
    public static function configRouters(\App\Router\Routing $router)
    {

        //Base Url
        $router->setBaseUrl(Config::$BASE_URL);

        //Page404
        $router->setPage404(function () {
            echo "Page 404";
        });

        //Routers
        $router->get('/', \App\Controllers\Home::class, "home");
        $router->get('/about', \App\Controllers\About::class, "about");
        $router->get('/contact', \App\Controllers\Contect::class, "contact");

        //Routers - Admin
        $router->get('/admin/news/create', \App\Controllers\Admin\NewsController::class, "create");
        $router->post('/admin/news/create/save', \App\Controllers\Admin\NewsController::class, "saveNew");
        $router->get('/admin/news/list-news', \App\Controllers\Admin\NewsController::class, "listNews");
        $router->get('/admin/news/delete', \App\Controllers\Admin\NewsController::class, "delete");

        //Routers - Products 
        $router->get('/admin/products/list-products', \App\Controllers\Admin\ProductsController::class, "listProducts");
        $router->get('/admin/products/create', \App\Controllers\Admin\ProductsController::class, "create");
        $router->post('/admin/products/create/save', \App\Controllers\Admin\ProductsController::class, "saveCreate");
        $router->get('/admin/products/delete', \App\Controllers\Admin\ProductsController::class, "delete");
        $router->get('/admin/products/edit', \App\Controllers\Admin\ProductsController::class, "edit");
        $router->post('/admin/products/edit/save', \App\Controllers\Admin\ProductsController::class, "saveEdit");

        //Routers - Categories
        $router->get('/admin/categoires/list-categories', \App\Controllers\Admin\CategoriesController::class, 'listCategories');
        $router->get('/admin/categories/create', \App\Controllers\Admin\CategoriesController::class, 'create');
        $router->post('/admin/categories/create/save', \App\Controllers\Admin\CategoriesController::class, 'saveCreate');
        $router->get('/admin/categories/delete', \App\Controllers\Admin\CategoriesController::class, "delete");
        $router->get('/admin/categories/edit', \App\Controllers\Admin\CategoriesController::class, "edit");
        $router->post('/admin/categories/edit/save', \App\Controllers\Admin\CategoriesController::class, 'saveEdit');

        //Routers - Users
        $router->get('/admin/users/create', \App\Controllers\Admin\UsersController::class, "create");
        $router->post('/admin/users/create/save', \App\Controllers\Admin\UsersController::class, 'saveCreate');
        $router->get('/admin/users/list-users', \App\Controllers\Admin\UsersController::class, "listUsers");
        $router->get('/admin/users/delete', \App\Controllers\Admin\UsersController::class, "delete");
        $router->get('/admin/users/edit', \App\Controllers\Admin\UsersController::class, "edit");
        $router->post('/admin/users/edit/save', \App\Controllers\Admin\UsersController::class, 'saveEdit');

        //Routers - Comments
        $router->get('/admin/comments/create', \App\Controllers\Admin\CommentsControllers::class, "create");
        $router->get('/admin/comments', \App\Controllers\Admin\CommentsControllers::class, "listComments");
        $router->get('/admin/comments/review', \App\Controllers\Admin\CommentsControllers::class, "reviewComments");
        $router->post('/admin/comments/create/save', \App\Controllers\Admin\CommentsControllers::class, 'saveCreate');
        $router->get('/admin/comments/discard', \App\Controllers\Admin\CommentsControllers::class, "discard");
        $router->get('/admin/comments/accept', \App\Controllers\Admin\CommentsControllers::class, "accept");

    }
}
