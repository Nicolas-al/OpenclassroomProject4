<?php

require_once('manager.php');

class ReportingManager extends Manager
{
    public function add($postId, $commentId, $pseudoId, $reason)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO reporting(post_id, comment_id, pseudo_id, reason, report_date) VALUES(?, ?, ?, ?, NOW())');

        $affectedLines = $q->execute(array($postId, $commentId, $pseudoId, $reason));

        return $affectedLines;
    }
    public function get()
    {
        $db = $this->dbConnect();
        $q = $db->query('SELECT COUNT(*) AS nb_reports, comment_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %H:%i:%s") AS date_c FROM reporting INNER JOIN comments ON reporting.comment_id = comments.id GROUP BY comment_id HAVING nb_reports >= 1 ORDER BY nb_reports DESC');

        return $q;
    }
}