<?php

namespace App\Repositories;


interface ICommentsRepository
{
    /** 
     * 
     * Function for listcomments
     */
    public function listComments(): array;

    /**
     * 
     * Function for review comments
     */
    public function reviewComments(): array;

    /**
     * 
     * @param string $email
     * @param string $password
     * @param string $comment
     */
    public function create(string $email, string $password, string $comment);

    /**
     * 
     * Function for discard comments
     */
    public function discard(int $id);

    /**
     * 
     * Function for accept comments 
     */
    public function accept(int $id);
}
