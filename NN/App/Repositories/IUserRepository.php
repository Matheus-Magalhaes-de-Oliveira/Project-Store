<?php

namespace App\Repositories;


interface IUserRepository
{


    /** 
     * @param string $name
     * @param string $email
     * @param  $type 
     * @param string $password

     */
    public function create(string $name, string $email, $type, string $password);

    /**
     * 
     * @param int $userId 
     * @param string $name 
     * @param string $email
     * @param  int $type
     */

    public function saveEdit(int $userId, string $name, string $email, int $type);

    /** 
     * 
     * Function for listUsers
     */
    public function listUsers(): array;

    /**
     * 
     *@param int $id
     */
    public function delete(int $id);

    /**
     * 
     * @param int $id
     */
    public function get(int $id): \stdClass;
}