<?php

namespace App\Services;



class CommentsDiscardService {

    private $commentsRepository;

    /**
     * 
     * @param \App\Repositories\ICommentsRepository $commentsRepository
     */
    public function __construct(\App\Repositories\ICommentsRepository $commentsRepository){
        $this->commentsRepository = $commentsRepository;
    }

    public function discard(int $id){
       return $this->commentsRepository->discard($id);
    }

}

?>