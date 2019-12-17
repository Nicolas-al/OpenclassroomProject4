<?php
namespace model;
require_once('Db_Factory.php');

class Manager
{
    public function dbConnect()
    {
        $db = New Db_Factory();
    }
}