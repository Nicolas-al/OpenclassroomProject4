<?php
session_start();
require_once('controllers/MainController.php');

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
                    case 'accueil': 
                        $page = new MainController();
                        $page->getPosts();
                    break;
                    case 'postView':
                        $page->getPost();
                    break;
                }
            }
        }
        catch(Exception $e)
        {

        }      


    } 
}


