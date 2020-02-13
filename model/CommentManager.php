<?php 
  

require_once('manager.php');

class CommentManager extends Manager
{
     public function add($postId, $author, $comment)
     {
  
        $db = $this->dbConnect(); 
        $q = $db->prepare('INSERT INTO comments(post_id, author, comment,
        comment_date, nb_reports) VALUES( ?, ?, ?, NOW(), 0)');
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
     public function update($nbReports, $id)
     {
      $db = $this->dbConnect(); 
      $q = $db->prepare('UPDATE comments SET nb_reports = ? WHERE id = ?');
      $affectedLines = $q->execute(array($nbReports, $id));

      return $affectedLines;
     }
     public function delete($id)
     {
      $db = $this->dbConnect(); 
      var_dump('salut');

      $q = $db->prepare('DELETE comments, reporting FROM comments INNER JOIN reporting ON comments.id = reporting.comment_id WHERE comments.id = ?');
      $deletedLines = $q->execute(array($id));

      return $deletedLines;

     }
    
};