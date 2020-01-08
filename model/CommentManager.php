<?php 
  

require_once('manager.php');

class CommentManager extends Manager
{
     public function add($postId, $author, $comment)
     {
  
        $db = $this->dbConnect(); 
        $q = $db->prepare('INSERT INTO comments(post_id, author, comment,
        comment_date) VALUES( ?, ?, ?, NOW())');
        $affectedLines = $q->execute(array($postId, $author, $comment));

        return $affectedLines;

     }
     public function get($postId)
     {
        $db = $this->dbConnect(); 
        $q = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC');
        $q->execute(array($postId));
  
 
        $comments = $q->fetchAll();

        return $comments;

      }
     public function setDb(PDO $db)
     {
         $this->_db = $db;
     }
    
};