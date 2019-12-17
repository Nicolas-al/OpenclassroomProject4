<?php
require('model/CommentManager.php');
require('model/PostManager.php');



class MainController
{ 

public function accueil()
{

}    

public function addComments($postId, $author, $content)
{
    $commentManager = new CommentManager();
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
     $postManager = New PostManager();
     $getPosts = $postManager->getList();
     echo 'salt';

     require('view/frontend/accueil.php'); 
    }

public function getPost()
 {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    echo 'salut';

    require('view/frontend/postView.php'); 
}

} 