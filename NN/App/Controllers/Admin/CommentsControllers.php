<?php

namespace App\Controllers\Admin;

class CommentsControllers extends \App\Controllers\Abstracts\BaseController{

        /**
     * comment form . create
     */
    public function create(){

        $data['page'] = "Admin/commentsCreateView";
        $this->view("Admin/indexView", $data);

    }

        /**
     * 
     * recieve information form comments and perform it on database
     */
    public function saveCreate(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comment = $_POST['comment'];

        $commentsRespository = new \App\Repositories\CommentsRepository(\App\Db\Conection::getConection());
        try {

            $commentsCreateService = new \App\Services\CommentsCreateService($commentsRespository);
            $commentsCreateService->create($email, $password, $comment);

            header("Location: " . \App\Config\Config::url("/admin/comments/review"));
            
        } catch (\Exception $e) {

            echo "Error on create comment: " . $e->getMessage();
        }
    }

    public function listComments()
    {
        $commentsRepository = new \App\Repositories\CommentsRepository(\App\Db\Conection::getConection());
        $commentsListService = new \App\Services\CommentsListService($commentsRepository);
        
        $comments = $commentsListService->listComments();;

        $data['comments'] = $comments;
        $data['page'] = "Admin/commentsListView";
        $this->view("Admin/indexView", $data);
    }

    public function reviewComments()
    {
        $commentsRepository = new \App\Repositories\CommentsRepository(\App\Db\Conection::getConection());
        $commentsReviewListService = new \App\Services\CommentsReviewListService($commentsRepository);
        
        $comments = $commentsReviewListService->reviewComments();;

        $data['comments'] = $comments;
        $data['page'] = "Admin/reviewcommentsListView";
        $this->view("Admin/indexView", $data);
    }

    public function discard()
    {
        $commentId = $_GET['id'];

        try {

            $commentsRepository = new \App\Repositories\CommentsRepository(\App\Db\Conection::getConection());
            $commentsDiscardService = new \App\Services\CommentsDiscardService($commentsRepository);
            $commentsDiscardService->discard($commentId);

            header("Location: " . \App\Config\Config::url("/admin/comments/review"));

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
    public function accept()
    {
        $commentId = $_GET['id'];

        try {

            $commentsRepository = new \App\Repositories\CommentsRepository(\App\Db\Conection::getConection());
            $commentsAcceptService = new \App\Services\CommentsAcceptService($commentsRepository);
            $commentsAcceptService->accept($commentId);

            header("Location: " . \App\Config\Config::url("/admin/comments/review"));

        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }
}

?>