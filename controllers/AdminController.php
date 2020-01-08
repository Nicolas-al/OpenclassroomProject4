<?php

require_once('model/PostManager.php');
require('model/AdminManager.php');

class AdminController {

    public function addAdmin($name, $firstName, $mail, $pseudo, $password) 
    {
        $adminManager = New AdminManager();
        $newAdmin = $adminManager->add($name, $firstName, $mail, $pseudo, $password);

        if ($newAdmin === false) {
            throw new Exception('Impossible de s\'inscrire !');
        } else {
            header('Location: index.php?action=homeAdmin');
        }

    }
    public function displayLoginAdmin()
    {
        require('view/backend/loginAdmin.php');
    }
    public function loginAdmin()
    {
        $adminManager = New AdminManager();
        $getAdmin = $adminManager->getData();
        $dataAdmin = $getAdmin->fetch();
        echo $dataAdmin['password'];
        if (isset($_POST['password']) && password_verify($_POST['password'], $dataAdmin['password']))
        {

            echo 'salut';
            header('Location: index.php?action=homeAdmin&id=' . $dataAdmin['id']);

        }
        else {
            echo 'erreur';
        }
        require 'view/backend/homeAdmin.php';
    }
       
    public function homeAdmin() 
    {
        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $getPosts = $postManager->getList();
        $getAdmin = $adminManager->getData();
        require 'view/backend/homeAdmin.php';
    }
    public function getOnePost()
    {
        $postManager = new PostManager();
        $adminManager = New AdminManager();

        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL)
            {
                $getAdmin = $adminManager->getData();
                $post = $postManager->getPost($_GET['id']);
            } 
        else {
            header('Location: index.php');
            }
        }
        require 'view/backend/postAdmin.php';        
    }

}