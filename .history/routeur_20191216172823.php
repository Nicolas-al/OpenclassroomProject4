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
                        $page = new MainController();
                        $page->getPost();
                        header('location: view/frontend/postView.php');
                    break;
                }
            }
        }
        catch(Exception $e)
        {

        }      


    } 
}


