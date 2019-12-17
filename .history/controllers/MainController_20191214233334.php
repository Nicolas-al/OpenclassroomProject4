<?php
namespace controllers;
require ('model/CommentManager.php');
require ('model/PostManager.php');
require ('model/Db_Factory.php');


class MainController
{ 

public function accueil()
{

}    

public function addComments($postId, $author, $content)
{
    $commentManager = new CommentManager($dbConnect);
    $newComment = $commentManager->postComment($postId, $author, $content);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

public function getPosts()
 {
     $postManager = New /model/PostManager();
     $getPosts = $postManager->$getPosts;

     require_once('view/frontend/accueil.php'); }

public function getPost()
 {
    $postManager = new PostManager();
    $commentManager = new CommentManager($dbConnect);

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
 }

} 