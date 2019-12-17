<?php
require_once('manager.php');

class PostManager extends Manager
{
    public function add($title, $content, $posted)
    {
       $db = $this->dbConnect(); 
       $q = $db->prepare('INSERT INTO comments(title, content, date) VALUES(:title,:content , NOW(), :posted)');
       $q->bindValue(':post_id', $title);
       $q->bindValue(':author', $content);
       $q->bindValue(':content', $posted);

       $newPost = $q->execute();

       return $newPost;

    }
    public function save($title, $content, $posted)
    {
       $q = $this->_db->prepare('INSERT INTO comments(title, content, date) VALUES(:title,:content , NOW(), :posted)');
       $q->bindValue(':post_id', $title);
       $q->bindValue(':author', $content);
       $q->bindValue(':content', $posted);

       $q->execute();
    }
    public function getList()
     {
        $db = $this->dbConnect(); 
        $q = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') FROM chapter ORDER BY date DESC LIMIT 0, 5');     
        
        return $q;
     }
    public function get($id)
    {
        $q = $this->_db->prepare('SELECT author, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') FROM chapter WHERE :id');
        $q->bindValue('id', $id);
        $q->execute();
        $getPost = $q->fetch();

        return $getPost;
    }
    public function setDb(PDO $db)
    {
         $this->_db = $db;
    }
}