<?php

require_once('manager.php');

class PostManager extends Manager
{
    public function addOne($title, $content)
    {
       $db = $this->dbConnect(); 
       $q = $db->prepare('INSERT INTO chapter(title, content, post_date, posted) VALUES(?,?, NOW(), true)');
       $affectedLines = $q->execute(array($title, $content));
       return $affectedLines;
    }
    public function addTwo($title, $content)
    {
       $db = $this->dbConnect(); 
       $q = $db->prepare('INSERT INTO chapter(title, content, post_date, posted) VALUES(?,?, NOW(), false)');
       $affectedLines = $q->execute(array($title, $content));
       return $affectedLines;
    }
    public function updateOne($title, $content, $id)
    {
       $db = $this->dbConnect(); 
       $q = $db->prepare('UPDATE chapter SET title = ?, content = ?, post_date = NOW(), posted = true WHERE id = ?');
       $updateLines = $q->execute(array($title, $content, $id));

       return $updateLines;
    }
    public function updateTwo($title, $content, $id)
    {
       $db = $this->dbConnect(); 
       $q = $db->prepare('UPDATE chapter SET title = ?, content = ?, post_date = NOW(), posted = false WHERE id = ?');
       $updateLines = $q->execute(array($title, $content, $id));

       return $updateLines;
    }
    public function getListFront()
     {
        $db = $this->dbConnect(); 
        $q = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y %H:%i:%s") AS date_p FROM chapter WHERE posted = 1 ORDER BY id DESC LIMIT 0, 5');     
        
        return $q;
     }
     public function getListBack()
     {
        $db = $this->dbConnect(); 
        $q = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y %H:%i:%s") AS date_p, posted FROM chapter ORDER BY id DESC');     
        
        return $q;
     }
     
    public function getPost($id)
    {
        $db = $this->dbConnect(); 
        $q = $db->prepare('SELECT * FROM chapter WHERE id = ?');
        $q->execute(array($id));
        $getPost = $q->fetch();
        return $getPost;
    }    
    public function delete($id){
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE  FROM chapter WHERE id = ?');
        $deleteLine = $q->execute(array($id)); 

        return $deleteLine;
    }

}