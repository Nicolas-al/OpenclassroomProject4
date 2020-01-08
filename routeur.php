<?php
session_start();
require 'controllers/MainController.php';
require 'controllers/AdminController.php';

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
                        $page->getOnePost();    
                    break;
                    case 'addComment':
                        $page = new MainController();
                        if (isset($_GET['id']) && $_GET['id'] > 0){
                            if (isset($_POST['form-pseudo']) && isset($_POST['form-comment'])){ 
                            $page->addComment($_GET['id'] ,$_POST['form-pseudo'], $_POST['form-comment']);
                            };
                        };
                    break;
                    case 'admin':
                        $page = new MainController();
                        $page->displayCreateAdmin();                        
                    break;
                    case 'addAdmin':
                        $adCtrl = new AdminController();
                        if (isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['mail']) && isset($_POST['new_pseudo']) && isset($_POST['new_password']) && isset($_POST['confirmPass']));
                        { 
                            if ($_POST['new_password'] == $_POST['confirmPass'])
                            {
                                $pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                                $adCtrl->addAdmin($_POST['name'], $_POST['firstName'],  $_POST['mail'], $_POST['new_pseudo'], $pass);
                            }
                            else {
                                header('Location: index.php?action=admin');
                            }
                        };   
                    break;
                    case 'adminConnect':
                        $adCtrl = new AdminController();
                        $adCtrl->loginAdmin();
                    case 'loginAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->displayLoginAdmin();
                    break;    
                    case 'homeAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->homeAdmin();
                            
                    break;
                    case 'postAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->getOnePost();
                    break;    
                    default:
                    echo 'introuvable';
                }
            }
        }
        catch(Exception $e)
        {
            
        }      


    } 
}


