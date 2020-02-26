<?php

require_once('manager.php');

class ReportingManager extends Manager
{
    public function add($postId, $commentId, $pseudoId)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO reporting(post_id, comment_id, pseudo_id, report_date) VALUES(?, ?, ?, NOW())');

        $affectedLines = $q->execute(array($postId, $commentId, $pseudoId));

        return $affectedLines;
    }
    public function count()
    {
        $db = $this->dbConnect();
        $q = $db->query('SELECT COUNT(*) post_id, nb_reports, comment_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_c FROM reporting INNER JOIN comments ON reporting.comment_id = comments.id GROUP BY comment_id HAVING nb_reports >= 1 ORDER BY nb_reports DESC');

        return $q;
    }
 
    public function delete($commentId)
    {
        $db = $this->dbConnect();
        $q = $db->query('DELETE * FROM reporting WHERE comment_id = ?');

        $deleteLines = $q->execute(array($commentId));

        return $deleteLines;
    }
}