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
                        $page->addComment();
                    break;
                    case 'admin':
                        $page = new MainController();
                        $page->displayCreateAdmin();                        
                    break;
                    case 'adminConnect':
                        $adCtrl = new AdminController();
                        $adCtrl->loginAdmin();
                    case 'loginAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->displayLoginAdmin();
                    break;
                    case 'disconnect':
                        $adCtrl = new AdminController();
                        $adCtrl->disconnect();
                    break;
                    case 'homeAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->homeAdmin(); 
                    break;
                    case 'postAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->getOnePost();
                    break;
                    case 'postAdminView':
                        $adCtrl = new AdminController();
                        $adCtrl->getOnePost();
                    break;  
                    case 'addPost':
                        $adCtrl = new AdminController();
                        $adCtrl->addPost();
                     
                    break;
                    case 'savePost': 
                        $adCtrl = new AdminController();
                        $adCtrl->savePost();  
                    break;
                    case 'report':
                        $page = new MainController();
                        $page->addReport();                                           
                    break;
                    case 'reportAdmin':
                        $page = new MainController();
                        $page->addReport(); 
                    break;  
                    case 'deleteComment':
                        $adCtrl = new AdminController();
                        $adCtrl->deleteComment();
                    break;
                    case 'deletePost':
                        $adCtrl = new AdminController();
                        $adCtrl->deletePost();
                    break;
                    case 'deleteReport':
                        $adCtrl = new AdminController();
                        $adCtrl->deleteReport();
                    break;
                    case 'infosAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->displayInfos();
                    break;
                    case 'setAdmin':
                        $adCtrl = new AdminController();
                        $adCtrl->update();
                    break;
                    default:
                    echo 'introuvable';
                }
            }
            else{
                header('location: index.php?action=accueil');
            }
        }
        catch(Exception $e)
        {
            
        }      


    } 
}


