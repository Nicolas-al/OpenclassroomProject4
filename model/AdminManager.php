<?php

class AdminManager extends Manager
{
    public function add($name, $firstName, $pseudo, $mail, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO admin(name, first_name, mail, pseudo, password) VALUES(?,?,?,?,?)');
        $affectedLines = $req->execute(array($name, $firstName, $mail, $pseudo, $password));

        return $affectedLines;
    }
    public function getData()
    {
        $db = $this->dbConnect();
        $q = $db->query('SELECT * FROM admin');     

        return $q;
    }
    public function getAdmin($id)
    {
        $db = $this->dbConnect(); 
        $q = $db->prepare('SELECT * FROM admin WHERE id = ?');
        $q->execute(array($id));
        $getAdmin = $q->fetch();
        
        return $getAdmin;
    }

    public function update($name, $firstName, $mail, $password, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE admin SET name = ? , first_name = ?, mail = ?, password = ? WHERE id = ?');
        $req->execute(array($name, $firstName, $mail, $password, $id));

        return $req;
    }
    public function delete($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM admin WHERE pseudo = ?');
        $deleteAdmin = $req->execute(array($pseudo));

        return $deleteAdmin;
    }
}