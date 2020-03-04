<?php

require_once('manager.php');

class PostManager extends Manager
{
    public function add($title, $content)
    {
       $db = $this->dbConnect();
       if (isset($_GET['action']) && $_GET['action'] == "addPost"){
          if (isset($_GET['posted']) && $_GET['posted'] == "true"){
            $q = $db->prepare('INSERT INTO chapters(title, content, post_date, posted) VALUES(?,?, NOW(), true)');
            $affectedLines = $q->execute(array($title, $content));
          }
          else if(isset($_GET['posted']) && $_GET['posted'] == "false"){
            $q = $db->prepare('INSERT INTO chapters(title, content, post_date, posted) VALUES(?,?, NOW(), false)');
            $affectedLines = $q->execute(array($title, $content));
          }
       } 
       return $affectedLines;
    }
    public function update($title, $content, $id)
    {
       $db = $this->dbConnect(); 
       var_dump("jesus");

       if (!empty($_GET['action']) && $_GET['action'] == "savePost"){
         var_dump("jesus");

         if (!empty($_GET['posted']) && $_GET['posted'] == 1){
            var_dump("jesus");
            $q = $db->prepare('UPDATE chapters SET title = ?, content = ?, post_date = NOW(), posted = true WHERE id = ?');
            $updateLines = $q->execute(array($title, $content, $id));
         }
         else if(!empty($_GET['posted']) && $_GET['posted'] == 0){
            var_dump("jesus");
            $q = $db->prepare('UPDATE chapters SET title = ?, content = ?, post_date = NOW(), posted = false WHERE id = ?');
            $updateLines = $q->execute(array($title, $content, $id));
         }
       }
      return $updateLines;
    }
   //  public function updateTwo($title, $content, $id)
   //  {
   //     $db = $this->dbConnect(); 
   //     $q = $db->prepare('UPDATE chapters SET title = ?, content = ?, post_date = NOW(), posted = false WHERE id = ?');
   //     $updateLines = $q->execute(array($title, $content, $id));

   //     return $updateLines;
   //  }
    public function getListFront()
     {
        $db = $this->dbConnect(); 
        $q = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y %H:%i:%s") AS date_p FROM chapters WHERE posted = 1 ORDER BY id DESC LIMIT 0, 5');     
        
        return $q;
     }
     public function getListBack()
     {
        $db = $this->dbConnect(); 
        $q = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y %H:%i:%s") AS date_p, posted FROM chapters ORDER BY id DESC');     
        
        return $q;
     }
     
    public function getPost($id)
    {
        $db = $this->dbConnect(); 
        $q = $db->prepare('SELECT * FROM chapters WHERE id = ?');
        $q->execute(array($id));
        $getPost = $q->fetch();
        return $getPost;
    }    
    public function delete($id){
        $db = $this->dbConnect();
        $q = $db->prepare('DELETE  FROM chapters WHERE id = ?');
        $deleteLine = $q->execute(array($id)); 

        return $deleteLine;
    }

}