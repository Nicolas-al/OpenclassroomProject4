<?php
namespace model;
require('Db_Factory.php');

class Manager
{
    public function dbConnect()
    {
        $db = New Db_Factory();
    }
}