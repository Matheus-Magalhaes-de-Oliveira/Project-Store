<?php

namespace App\Services;



class UsersDeleteService {

    private $usersRepository;

    /**
     * 
     * @param \App\Repositories\IUserRepository $usersRepository
     */
    public function __construct(\App\Repositories\IUserRepository $usersRepository){
        $this->usersRepository = $usersRepository;
    }

    public function delete(int $id){
       return $this->usersRepository->delete($id);
    }

}

?>