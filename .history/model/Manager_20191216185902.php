<?php
namespace controller;


class Manager
{
    public function dbConnect()
    {
        try 
        {
        $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}