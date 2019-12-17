<?php
namespace controllers;
require ('model/CommentManager.php');
require ('model/PostManager.php');
require ('model/Db_Factory.php');

/*$db = new DbFactory()
$dbConnect = $db->dbConnect();*/

class MainController
{ 

public function accueil()
{
echo 'bonjour';
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
     $postManager = New PostManager($dbConnect);
     $getPosts = $postManager->getList();

     require('view/frontend/listPostView.php');
 }

public function getPost()
 {
    $postManager = new PostManager($dbConnect);
    $commentManager = new CommentManager($dbConnect);

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
 }

} 