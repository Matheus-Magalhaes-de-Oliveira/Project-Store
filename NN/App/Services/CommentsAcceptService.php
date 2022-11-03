<?php

namespace App\Services;



class CommentsAcceptService {

    private $commentsRepository;

    /**
     * 
     * @param \App\Repositories\ICommentsRepository $commentsRepository
     */
    public function __construct(\App\Repositories\ICommentsRepository $commentsRepository){
        $this->commentsRepository = $commentsRepository;
    }

    public function accept(int $id){
       return $this->commentsRepository->accept($id);
    }
}
?>