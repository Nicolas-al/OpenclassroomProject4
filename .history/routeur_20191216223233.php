<?php
session_start();
require('controllers/MainController.php');

class Route
{

    public function __construct()
   { 
        try
        {
            if(isset($_GET['action']))
            { 
                switch ($_GET['action'])
                {
                    
                    case 'postView':
                        $page2 = new MainController();
                        $page2->getPost();
                    break;
                }
            }
        }
        catch(Exception $e)
        {
            
        }      


    } 
}


