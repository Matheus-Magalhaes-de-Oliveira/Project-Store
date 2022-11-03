<?php

namespace App\Services;



class UsersListService {

    private $usersRepository;

    /**
     * 
     * @param \App\Repositories\IUserRepository $usersRepository
     */
    public function __construct(\App\Repositories\IUserRepository $usersRepository){
        $this->usersRepository = $usersRepository;
    }

    public function listUsers():array {
       return $this->usersRepository->listUsers();
    }

}

?>