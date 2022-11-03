<?php

namespace App\Controllers\Admin;

class UsersController extends \App\Controllers\Abstracts\BaseController
{

    /**
     * users form . create
     */
    public function create()
    {

        $data['page'] = "Admin/usersCreateView";
        $this->view("Admin/indexView", $data);
    }

    /**
     * 
     * recieve information form users and perform it on database
     */
    public function saveCreate()
    {
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $password = $_POST['password'];

        $usersRepository = new \App\Repositories\UsersRepository(\App\Db\Conection::getConection());

        try {

            $usersCreateService = new \App\Services\UsersCreateService($usersRepository);
            $usersCreateService->create($name, $email, $type, $password);

            header("Location: " . \App\Config\Config::url("/admin/users/list-users"));
        } catch (\Exception $e) {

            echo "Error on create product: " . $e->getMessage();
        }
    }

    public function listUsers()
    {
        $usersRepository = new \App\Repositories\UsersRepository(\App\Db\Conection::getConection());
        $usersListService = new \App\Services\UsersListService($usersRepository);
        
        $users = $usersListService->listUsers();;

        $data['users'] = $users;
        $data['page'] = "Admin/usersListView";
        $this->view("Admin/indexView", $data);
    }

    public function delete()
    {
        $userId = $_GET['id'];

        try {

            $usersRepository = new \App\Repositories\UsersRepository(\App\Db\Conection::getConection());
            $usersDeleteService = new \App\Services\UsersDeleteService($usersRepository);
            $usersDeleteService->delete($userId);

            header("Location: " . \App\Config\Config::url("/admin/users/list-users"));
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }

    public function edit()
    {
        $userId = $_GET['id'];

        $usersRepository = new \App\Repositories\UsersRepository(\App\Db\Conection::getConection());
        $usersGetService = new \App\Services\UsersGetService($usersRepository);
        $users = $usersGetService->get($userId);

        $data['users'] = $users;
        $data['page'] = "Admin/usersEditView";
        $this->view("Admin/indexView", $data);
    }

    public function saveEdit()
    {
        $name = $_POST['fullname'];
        $userId = $_GET['id'];
        $email = $_POST['email'];
        $type =  $_POST['type'];

        $usersRepository = new \App\Repositories\UsersRepository(\App\Db\Conection::getConection());
        $usersGetService = new \App\Services\UsersGetService($usersRepository);

        try {

            $userEditService = new \App\Services\UsersEditService($usersRepository, $usersGetService);
            $userEditService->edit($userId, $name, $email, $type);

            header("Location: " . \App\Config\Config::url("/admin/users/list-users"));
        } catch (\Exception $e) {

            echo "Error on create product: " . $e->getMessage();
        }
    }
}
