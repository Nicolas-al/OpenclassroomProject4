<?php 
namespace model;
require('manager.php')

class CommentManager extends Manager
{
    protected $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }
     public function add($postId, $author, $content)
     {
        $q = $this->_db->prepare('INSERT INTO comments(post_id, author, content,
        comment_date) VALUES(:post_id, :author ,:content , NOW())');
        $q->bindValue(':post_id', $postId);
        $q->bindValue(':author', $author);
        $q->bindValue(':content', $content);

        $q->execute();
     }
     public function get($postId)
     {
        $q = $this->_db->prepare('SELECT author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') WHERE :post_id FROM comment ORDER BY id DESC');
        $q->bindValue('post_id', $postId);
        
        $q->execute();
     }
     public function setDb(PDO $db)
     {
         $this->_db = $db;
     }
    
};