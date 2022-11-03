<?php

namespace App\Services;



class CommentsListService {

    private $commentsRepository;

    /**
     * 
     * @param \App\Repositories\ICommentsRepository $commentsRepository
     */
    public function __construct(\App\Repositories\ICommentsRepository $commentsRepository){
        $this->commentsRepository = $commentsRepository;
    }

    public function listComments():array {
       return $this->commentsRepository->listComments();
    }

}

?>