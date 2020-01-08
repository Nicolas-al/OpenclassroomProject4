<?php

require('model/CommentManager.php');
require_once('model/PostManager.php');



class MainController
{ 
 
    public function getPosts()
    {
        $postManager = New PostManager();
        $getPosts = $postManager->getList();

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
        $newComment = $commentManager->add($postId, $author, $comment);  
    }
    public function getComments()
    {
        require 'view/frontend/postView.php';
    }

} 