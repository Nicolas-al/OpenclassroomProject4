<?php
namespace model;

class Manager
{
    public function dbConnect()
    {
        try 
        {
        $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
        return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}