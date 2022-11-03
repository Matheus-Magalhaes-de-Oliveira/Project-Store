<?php

namespace App\Services;

class UsersCreateService
{
    private $usersRepository;


    function __construct(\App\Repositories\IUserRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function create(string $name, string $email, $type, string $password)
    {

        if (empty($name)) {
            throw new \Exception("Invalid user name");
        }

        if (empty($email)) {
            throw new \Exception("Invalid user email");
        }

        if (empty($type)) {
            throw new \Exception("Invalid user type");
        }

        if (empty($password)) {
            throw new \Exception("Invalid user password");
        }

        $this->usersRepository->create($name, $email, $type, $password);
    }
}
