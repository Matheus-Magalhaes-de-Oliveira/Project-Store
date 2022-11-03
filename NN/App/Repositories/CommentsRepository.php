<?php

namespace App\Repositories;

use stdClass;

class CommentsRepository implements ICommentsRepository
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

    public function create(string $email, string $password, string $comment)
    {

        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $this->con->query($sql);

        $effect = $this->con->query($sql);
        $outcome = $effect->fetch_object();

        if ($outcome === null) {
            throw new \Exception("User not found");
            exit;
        }

        $sql = "SELECT id_user FROM users WHERE email = '{$email}'";
        $this->con->query($sql);

        $result = $this->con->query($sql);
        $id_user = $result->fetch_object()->id_user;

        $sql = "SELECT password FROM users WHERE email = '{$email}'";
        $this->con->query($sql);

        $count = $this->con->query($sql);
        $pursuance = $count->fetch_object()->password;

        if (password_verify($password, $pursuance)) {
        } else {
            throw new \Exception("User not found");
            exit;
        }

        $sql = "INSERT INTO comments (`comments`, `users_id`, `status`) VALUES ('{$comment}', '{$id_user}', 'Review');";
        $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function reviewComments(): array{
        $sql = "SELECT * FROM `comments` WHERE `status` != 'Negate'";
        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        $comments = [];
        while ($comment = $result->fetch_object()) {
            $comments[] = $comment;
        }

        return $comments;

    }

    public function discard(int $id)
    {

        $sql = "UPDATE `comments` SET `status` = 'Negate' WHERE `id_comments` = '{$id}'";
        $this->con->query($sql);


        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    }

    public function accept(int $id)
    {
        $sql = "UPDATE `comments` SET `status` = 'Accept' WHERE `id_comments` = '{$id}'";
        $this->con->query($sql);


        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }
    } 
       
    public function listComments(): array
    {
        $sql = "SELECT * FROM `comments` WHERE status = 'Accept'";
        $result = $this->con->query($sql);

        if ($this->con->error) {
            throw new \Exception("$this->con->error");
        }

        $comments = [];
        while ($comment = $result->fetch_object()) {
            $comments[] = $comment;
        }

        return $comments;
    }
}
