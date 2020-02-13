<?php

require_once('model/CommentManager.php');
require_once('model/PostManager.php');
require_once('model/ReportingManager.php');


class MainController
{ 
 
    public function getPosts()
    {
        $postManager = New PostManager();
        $getPosts = $postManager->getListFront();
        require 'view/frontend/accueil.php'; 
    }

    public function getOnePost()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL)
            {
                $post = $postManager->getPost($_GET['id']);
                if($post)
                { 
                    $comments = $commentManager->get($_GET['id']);
                }
            } 
        else {
            header('Location: index.php');
            }
        }
        require 'view/frontend/postView.php';        
    }

    public function displayCreateAdmin()
    {
        require 'view/frontend/admin.php';
    } 
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        echo 'zut';
        $newComment = $commentManager->add($postId, $author, $comment);
        echo 'zut';

        if ($newComment === false) {
            throw new Exception('Impossible de s\'inscrire !');
        } else {  
        header('Location: index.php?action=postView&id=' . $postId);
        }    
    }
    public function addReport($postId, $commentId, $pseudoId, $reason)
    { 
        $reportingManager = new ReportingManager();
        $newReport = $reportingManager->add($postId, $commentId, $pseudoId, $reason);

        if ($newReport === false) {

            throw new Exception('Impossible de signaler le commentaire !');
        } else {  

        header('Location: index.php?action=postView&id=' . $postId);
        }  
        
    }
    public function updateComment($nbReports, $id)
    {
        $commentManager = new CommentManager();
        $updateNbReports = $commentManager->update($nbReports, $id);

    }
    public function getComments()
    {
        require 'view/frontend/postView.php';
    }

} 