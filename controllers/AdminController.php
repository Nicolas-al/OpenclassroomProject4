<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require('model/AdminManager.php');
require_once('model/ReportingManager.php');


class AdminController {

    public function addAdmin($name, $firstName, $mail, $pseudo, $password) {
        $adminManager = New AdminManager();
        $newAdmin = $adminManager->add($name, $firstName, $mail, $pseudo, $password);
        if ($newAdmin === false) {
            throw new Exception('Impossible de s\'inscrire !');
        } else {
            $getData = $adminManager->getData();
            while ($dataAdmin = $getData->fetch()) {
                header('Location: index.php?action=homeAdmin&id='.$dataAdmin['id']);
            }
        }
    }

    public function displayLoginAdmin() {
        require('view/frontend/loginAdmin.php');
    }

    public function loginAdmin() {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        while ($dataAdmin = $getData->fetch()) {
            if (isset($_POST['mail']) && isset($_POST['password'])) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && $_POST['mail'] == $dataAdmin['mail']) {
                    if (password_verify($_POST['password'], $dataAdmin['password'])) {
                        $_SESSION['role'] = 'admin';
                        header('Location: index.php?action=homeAdmin&id='.$dataAdmin['id']);
                        unset($_SESSION['erreurmail']);
                        unset($_SESSION['erreurpass']);
                    } else {
                        $_SESSION['erreurpass'] = "mot de passe incorrect";
                        header('Location: index.php?action=loginAdmin');
                        var_dump($_POST['password']);
                    }
                } else if (!password_verify($_POST['password'], $dataAdmin['password'])) {
                    $_SESSION['erreurmail'] = "email non valide";
                    $_SESSION['erreurpass'] = "mot de passe incorrect";
                    header('Location: index.php?action=loginAdmin');
                } else if (password_verify($_POST['password'], $dataAdmin['password'])) {
                    $_SESSION['erreurmail'] = "email non valide";
                    header('Location: index.php?action=loginAdmin');
                }

            } else {

            }
        }

        require 'view/backend/homeAdmin.php';
    }

    public function homeAdmin() {
        if (!isset($_SESSION['role'])) {
            header('Location: index.php?action=loginAdmin');
        };
        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $reportingManager = new ReportingManager();
        $commentManager = new CommentManager();
        $reports = $reportingManager->get();
        $getPosts = $postManager->getListBack();
        $getData = $adminManager->getData();

        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL) {
                $getAdmin = $adminManager->getAdmin($_GET['id']);
            }
        }
        require 'view/backend/homeAdmin.php';
    }
    public function disconnect() {
        session_destroy();
        header('Location: index.php?action=accueil');
    }
    public function getOnePost() {

        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $commentManager = new CommentManager();
        $getData = $adminManager->getData();

        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            if ($_GET['id'] != NULL) {

                if (isset($_GET['action']) && $_GET['action'] == 'postAdmin') {
                    $post = $postManager->getPost($_GET['id']);
                    require 'view/backend/postAdmin.php';
                }
                if (isset($_GET['action']) && $_GET['action'] == 'postAdminView') {
                    $getData = $adminManager->getData();
                    $post = $postManager->getPost($_GET['id']);
                    $comments = $commentManager->get($_GET['id']);
                    require 'view/backend/postAdminView.php';
                }

            } else {
                header('Location: index.php');
            }
        } else {
            require 'view/backend/postAdmin.php';
        }

    }
    public function addPost() {
        $postManager = New PostManager();
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        $dataAdmin = $getData->fetch();
        if (isset($_POST['title']) && isset($_POST['tiny_text_area'])) {
            $postManager->add($_POST['title'], htmlspecialchars_decode($_POST['tiny_text_area']));
        }
        header('Location: index.php?action=homeAdmin&id='.$dataAdmin['id']);
    }
    public function savePost() {
        $postManager = New PostManager();
        $post = $postManager->getPost($_GET['id']);
        if (isset($_POST['title']) && isset($_POST['tiny_text_area']) && isset($_GET['id']) && isset($_GET['posted'])) {
            $postManager->update($_POST['title'], $_POST['tiny_text_area'], $_GET['id']);
        }
        header('Location: index.php?action=postAdmin&id='.$_GET['id'].
            '&posted='.$_GET['posted']);
    }

    public function deleteComment() {
        $commentManager = new CommentManager();
        $adminManager = New AdminManager();
        if (!empty($_GET['commentid'])) {
            if ($_GET['commentid'] != NULL) {
                $commentManager->delete($_GET['commentid']);
                $getData = $adminManager->getData();
                while ($dataAdmin = $getData->fetch()) {
                    header('Location: index.php?action=homeAdmin&id='.$dataAdmin['id']);
                };
            } else {
                header('Location: index.php');
            };
        }
    }
    public function deletePost($id) {
        $postManager = New PostManager();
        $adminManager = New AdminManager();

        if (!empty($id)) {

            $id = intval($id);
            if ($id != NULL) {
                $postManager->delete($id);
                $getData = $adminManager->getData();
                while ($dataAdmin = $getData->fetch()) {
                    header('Location: index.php?action=homeAdmin&id='.$dataAdmin['id']);
                }
            } else {
                header('Location: index.php');
            }
        }
    }
    public function displayInfos() {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        require 'view/backend/infosAdmin.php';
    }
    public function update() {
        $adminManager = New AdminManager();
        $getData = $adminManager->getData();
        $data = $getData->fetch();
        if (!empty($_GET['name']) && isset($_GET['firstname']) && isset($_GET['mail'])) {
            if (filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
                $adminManager->update($_GET['name'], $_GET['firstname'], $_GET['mail'], $data['password'], $data['id']);
                echo 'vos informations ont bien été modifiés';
            } else {
                echo 'l\'adresse email est incorrect';
            }
        }


        if (!empty($_GET['currentpassword']) && !empty($_GET['newpassword']) && !empty($_GET['confirmpassword'])) {

            if ($_GET['currentpassword'] == password_verify($_GET['currentpassword'], $data['password'])) {
                if ($_GET['newpassword'] == $_GET['confirmpassword']) {
                    $options = [
                        'cost' => 12,
                    ];
                    $pass = password_hash($_GET['newpassword'], PASSWORD_BCRYPT, $options);
                    $adminManager->update($data['name'], $data['first_name'], $data['mail'], $pass, $data['id']);
                    echo 'le mot de passe à bien été modifié';
                } else {
                    echo 'le nouveau mot de passe et celui confirmé sont différents';
                }
            } else {
                echo 'l\'ancien mot de passe n\'est pas le bon';
            }


        } else if (empty($_GET['name']) && empty($_GET['firstname']) && empty($_GET['mail'])) {
            echo 'veuillez remplir le ou les champs vides';
        }

    }
}