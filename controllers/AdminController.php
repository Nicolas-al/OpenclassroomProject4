<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require('model/AdminManager.php');
require_once('model/ReportingManager.php');


class AdminController {

    public function addAdmin($name, $firstName, $mail, $pseudo, $password) 
    {
        $adminManager = New AdminManager();
        $newAdmin = $adminManager->add($name, $firstName, $mail, $pseudo, $password);
        if ($newAdmin === false) {
            throw new Exception('Impossible de s\'inscrire !');
        } else {
            $getData = $adminManager->getData();
            while ($dataAdmin = $getData->fetch())
            { 
            header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);
            }
        }



    }
    public function displayLoginAdmin()
    {
        require('view/backend/loginAdmin.php');
    }
    public function loginAdmin()
    {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        
        while ($dataAdmin = $getData->fetch())
        { 
            if (isset($_POST['password']) && password_verify($_POST['password'], $dataAdmin['password']))
            {
                $_SESSION['role'] = 'admin';
                header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);
            }
            else {
                echo 'erreur';
            }
        }
        
        require 'view/backend/homeAdmin.php';
    }
       
    public function homeAdmin() 
    {
        if (!isset($_SESSION['role'])){
                header('Location: index.php?action=loginAdmin');    
        };
        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $reportingManager = new ReportingManager();
        $getReports = $reportingManager->get();
        $getPosts = $postManager->getListBack();
        $getData = $adminManager->getData();
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL)
            {               
                $getAdmin = $adminManager->getAdmin($_GET['id']);
            }
        }
        require 'view/backend/homeAdmin.php';
    }
     public function disconnect()
     {
         session_destroy();
         header('Location: index.php?action=accueil');
     }
    public function getOnePost()
    {

        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $commentManager = new CommentManager();
        $getData = $adminManager->getData();

        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL)
            {
                
                if (isset($_GET['action']) && $_GET['action'] == 'postAdmin')
                {    
                    $post = $postManager->getPost($_GET['id']);
                    require 'view/backend/postAdmin.php';
                }
                if (isset($_GET['action']) && $_GET['action'] == 'postAdminView')
                {
                    $getData = $adminManager->getData();
                    $post = $postManager->getPost($_GET['id']);
                    $comments = $commentManager->get($_GET['id']);
                    require 'view/backend/postAdminView.php';
                }

            } 
        else {
            header('Location: index.php');
            }
        }
        else {
            require 'view/backend/postAdmin.php';
        }

    }
    public function addPost($title, $content)
    {
        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        $dataAdmin = $getData->fetch();
        if (isset($_GET['posted']) && $_GET['posted'] == 'true'){ 
            $addPost = $postManager->addOne($title, $content);
            echo 'slt';
        }
        else{
            $addPost = $postManager->addTwo($title, $content);
            echo 'geant';
        } 
            header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);
    }
    public function savePost($title, $content, $id)
    {
        $postManager = New PostManager();
        $post = $postManager->getPost($_GET['id']);      
        var_dump($post['posted']);
        if (isset($_GET['posted']) && $_GET['posted'] == 'true')
        { 
            $postManager->updateOne($title, $content, $id);
            echo 'slt';
        }
        else{
            $postManager->updateTwo($title, $content, $id);
            echo 'geant';
        }
        
        header('Location: index.php?action=postAdmin&id=' . $_GET['id'] . '&posted=' . $_GET['posted']);        
    }
    public function getReports()
    {
        $reportingManager = new ReportingManager();
        $getReports = $reportingManager->get();
        require 'view/backend/homeAdmin.php';
    }
    public function deleteComment($id)
    {
        $commentManager = new CommentManager();
        $adminManager = New AdminManager();
        if(!empty($id)){

            $id = intval($id);
            if ($id != NULL)
            {              
                $deleteComment = $commentManager->delete($id);
                $getData = $adminManager->getData();                
                while ($dataAdmin = $getData->fetch())
                { 
                    header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);
                };
            }
            else{
                header('Location: index.php');
            };
        }
    }
    public function deletePost($id)
    {
        $postManager = New PostManager();
        $adminManager = New AdminManager();

        if(!empty($id)){

            $id = intval($id);
            if ($id != NULL)
            {       
                echo 'salut';
          
                $deletePost = $postManager->delete($id);
                echo 'salut';
                $getData = $adminManager->getData();                
                while ($dataAdmin = $getData->fetch())
                { 
                    echo 'salut';
                    header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);
                }

            }
            else{
                header('Location: index.php');
            }
        }
    }
    public function displayInfos()
    {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();

        require 'view/backend/infosAdmin.php';
    }
    public function update()
    {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();    
        $data = $getData->fetch();
        // echo $_GET['currentpassword'] . ' ' . $_GET['newpassword'] . ' ' . $_GET['confirmpassword'];
        if (!empty($_GET['name']) && isset($_GET['firstname']) && isset($_GET['mail'])){
            $adminManager->update($_GET['name'], $_GET['firstname'], $_GET['mail'], $data['password'], $data['id'] );
        }
        if (!empty($_GET['currentpassword']) && !empty($_GET['newpassword']) && !empty($_GET['confirmpassword'])){
            if ($_GET['currentpassword'] == password_verify($_GET['currentpassword'] ,$data['password'])){
                if ($_GET['newpassword'] == $_GET['confirmpassword']){ 
                $options = [
                    'cost' => 12,
                    ];  
                $pass = password_hash($_GET['newpassword'], PASSWORD_BCRYPT, $options);
                $adminManager->update($data['name'], $data['first_name'], $data['mail'], $pass, $data['id']);
                echo 'le mot de passe à bien été modifié';
                }
                else{
                    echo 'le nouveau mot de passe et celui confirmé sont différents';
                }
            }
            else{ 
                echo 'l\'ancien mot de passe n\'est pas le bon';
            }
        }
        else if(!empty($_GET['name']) && isset($_GET['firstname']) && isset($_GET['mail'])){
            echo 'vos informations ont bien été modifiés';
        }
        else{
            echo 'veuillez remplir tout les champs !';
        }
    }
    // public function getPass()
    // {
    //     $adminManager = New AdminManager();
    //     $getData = $adminManager->getData();    
    //     $data = $getData->fetch();
    //     require 'public/mdp.php';

    // }
}