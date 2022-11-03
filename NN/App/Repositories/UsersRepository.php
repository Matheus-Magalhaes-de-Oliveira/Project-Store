<?php

namespace App\Repositories;

use stdClass;

class UsersRepository implements IUserRepository
{

    /**
     * 
     * @var mysqli
     */
    private $con;

    /**
     * 
     * @param \mysqli $con
     */

    public function __construct(\mysqli $con)
    {
        $this->con = $con;
    }

    public function create(string $name, string $email, $type, string $password)
    {
        $name = addslashes($name);
        $email = addslashes($email);
        $created_at = date('Y-m-d H:i:s');
        
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`id_user`, `fullname`, `email`, `password`, `type`, `created_at`) 
        VALUES (NULL, '{$name}', '{$email}', '{$pass}', '{$type}', '{$created_at}')";
        dump($sql);
        $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function listUsers(): array
    {
        $sql = "SELECT * FROM users";
        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        $users = [];
        while ($user = $result->fetch_object()) {
            $users[] = $user;
        }

        return $users;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM users WHERE id_user = " . $id;

        $this->con->query($sql);


        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function get(int $id): stdClass
    {
        $sql = "SELECT * FROM users WHERE id_user = " . $id;

        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        if ($result->num_rows <= 0) {
            throw new \Exception("there is no product with id:{$id}");
        }

        return $result->fetch_object();
    }

    public function saveEdit(int $userId, string $name, string $email, $type)
    {
        $name = addslashes($name);
        $email = addslashes($email);

        $sql = "UPDATE users SET fullname = '{$name}', email = '{$email}', 
        type = '{$type}' WHERE id_user = '{$userId}';";
        $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }
}