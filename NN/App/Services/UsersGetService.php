<?php

namespace App\Services;



class UsersGetService {

    private $usersRepository;

    /**
     * 
     * @param \App\Repositories\IUserRepository $usersRepository
     */
    public function __construct(\App\Repositories\IUserRepository $usersRepository){
        $this->usersRepository = $usersRepository;
    }

    public function get(int $id): object {
       return $this->usersRepository->get($id);
    }
}

?>