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
                                echo 'salut';
                            $page->addComment($_GET['id'] ,$_POST['form-pseudo'], $_POST['form-comment']);
                            echo 'salut';

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
                                $options = [
                                'cost' => 12,
                                ];  
                                $pass = password_hash($_POST['new_password'], PASSWORD_BCRYPT, $options);
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
                        if (isset($_POST['title']) && isset($_POST['tiny_text_area']))
                        {
                        $adCtrl->addPost($_POST['title'], htmlspecialchars_decode($_POST['tiny_text_area']));
                        }  
                    break;
                    case 'savePost': 
                        $adCtrl = new AdminController();
                        if (isset($_POST['title']) && isset($_POST['tiny_text_area']) && isset($_GET['id']) && isset($_GET['posted']))
                        {
                        $adCtrl->savePost($_POST['title'], $_POST['tiny_text_area'], $_GET['id']);
                        }
                      
                    break;
                    case 'report':
                        $page = new MainController();
                        $adCtrl = new AdminController();
                        $reports =  $_GET['nb_reports'];
                        if(!empty($_GET['comment_id'])){

                            $id = intval($_GET['comment_id']);
                            if ($_GET['comment_id'] != NULL)
                            {
                                $reports++;
                                $page->updateComment($reports ,$_GET['comment_id']);
                                $page->addReport($_GET['post_id'] ,$_GET['comment_id'], 'Robin', 'haineux');
                           }
                        else{
                                header('Location: index.php');
                            };
                        }
                        else {
                            echo 'zut';
                        }
                    break;
                    case 'deleteComment':
                        $adCtrl = new AdminController();
                        $adCtrl->deleteComment($_GET['comment_id']);
                    break;
                    case 'deletePost':
                        $adCtrl = new AdminController();
                        $adCtrl->deletePost($_GET['id']);
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
        }
        catch(Exception $e)
        {
            
        }      


    } 
}


