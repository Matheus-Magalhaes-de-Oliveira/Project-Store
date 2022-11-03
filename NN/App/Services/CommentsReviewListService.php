<?php

namespace App\Services;



class CommentsReviewListService {

    private $commentsRepository;

    /**
     * 
     * @param \App\Repositories\ICommentsRepository $commentsRepository
     */
    public function __construct(\App\Repositories\ICommentsRepository $commentsRepository){
        $this->commentsRepository = $commentsRepository;
    }

    public function reviewComments():array {
       return $this->commentsRepository->reviewComments();
    }

}

?>