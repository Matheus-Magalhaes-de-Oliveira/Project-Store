<?php

namespace App\Services;


class UsersEditService {
    private $usersRepository; 
    private $usersGetService;


    function __construct(\App\Repositories\IUserRepository $usersRepository, \App\Services\UsersGetService $usersGetService){
        $this->usersRepository = $usersRepository;
        $this->usersGetService = $usersGetService;
    }

    public function edit(int $userId, string $name, string $email, $type){

        if(empty($name)){
            throw new \Exception("invalid user name");
        }

        if(empty($email)){
            throw new \Exception("invalid user email");
        }

        if(empty($type)){
            throw new \Exception("invalid user type");
        }
        
        $this->usersRepository->saveEdit($userId, $name, $email, $type);
    }
}