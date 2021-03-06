<?php 
require_once('Manager.php');

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
     public function get($Id)
     {
        $db = $this->dbConnect(); 
        if (!empty($_GET['action'])){
           if($_GET['action'] == 'postView' || $_GET['action'] == 'postAdminView'){ 
           
            $q = $db->prepare('SELECT *, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_c FROM comments WHERE post_id = ? ORDER BY id DESC');
            $q->execute(array($Id));
            
            $comments = $q->fetchAll();
            }
            elseif(!empty($_GET['action']) && $_GET['action'] == 'report'){
            
            $q = $db->prepare('SELECT *, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_c FROM comments WHERE id = ?');
            $q->execute(array($Id));

            $comments = $q->fetch();
            
            }     

        }
                 
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

      $q = $db->prepare('DELETE comments, reporting FROM comments INNER JOIN reporting ON comments.id = reporting.comment_id WHERE comments.id = ?');
      $deletedLines = $q->execute(array($id));

      return $deletedLines;

     }
    
};