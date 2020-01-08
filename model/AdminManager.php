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
    public function update($pseudo, $mail, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE admin SET pseudo = ? , mail = ?, password = ?');
        $req->execute(array($pseudo, $mail, $password));

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