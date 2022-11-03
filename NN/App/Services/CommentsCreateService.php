<?php

namespace App\Services;

use App\Services\UploadsService;

class CommentsCreateService
{
    private $commentsRespository;

    function __construct(\App\Repositories\ICommentsRepository $commentsRespository)
    {
        $this->commentsRespository = $commentsRespository;
    }

    public function create($email, $password, $comment)
    {

        if (empty($email)) {
            throw new \Exception("Invalid user email");
        }

        if (empty($password)) {
            throw new \Exception("Invalid user password");
        }

        if (empty($comment)) {
            throw new \Exception("Insert your comment");
        }

        $this->commentsRespository->create($email, $password, $comment);
    }
}
