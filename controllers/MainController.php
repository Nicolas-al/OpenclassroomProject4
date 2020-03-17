<?php

require_once('model/CommentManager.php');
require_once('model/PostManager.php');
require_once('model/ReportingManager.php');


class MainController {
    public function getPosts() {
        $postManager = New PostManager();
        $getPosts = $postManager->getListFront();
        unset($_SESSION['erreurmail']);
        unset($_SESSION['erreurpass']);

        require 'view/frontend/accueil.php';
    }

    public function getOnePost() {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        if (!empty($_GET['id'])) {
            if ($_GET['id'] != NULL) {
                $post = $postManager->getPost($_GET['id']);
                if ($post) {
                    $comments = $commentManager->get($_GET['id']);
                }
            } else {
                header('Location: index.php');
            }
        }
        require 'view/frontend/postView.php';
    }

    public function displayCreateAdmin() {
        require 'view/frontend/admin.php';
    }
    public function addComment() {
        $commentManager = new CommentManager();
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_POST['form-pseudo']) && $_POST['form-pseudo'] != "Admin" && isset($_POST['form-comment'])) {
                $newComment = $commentManager->add($_GET['id'], htmlspecialchars($_POST['form-pseudo']), htmlspecialchars($_POST['form-comment']));
                if ($newComment === false) {
                    throw new Exception('Impossible de s\'inscrire !');
                } else {
                    header('Location: index.php?action=postView&id=' . $_GET['id']. '&titlepost=' . $_GET['titlepost']);
                }
            }
            elseif(isset($_POST['form-pseudo']) && $_POST['form-pseudo'] == "Admin" && isset($_POST['form-comment'])) {
                $newComment = $commentManager->add($_GET['id'], htmlspecialchars($_POST['form-pseudo']), htmlspecialchars($_POST['form-comment']));
                if ($newComment === false) {
                    throw new Exception('Impossible de s\'inscrire !');
                } else {
                    header('Location: index.php?action=postAdminView&id=' . $_GET['id']);
                }

            }
            else {
                echo 'erreur';
            }
        }
    }
    public function addReport() {
        $reportingManager = new ReportingManager();
        $commentManager = new CommentManager();
        $reports = $_GET['nbreports'];

        if (!empty($_GET['commentid'])) {
            $id = intval($_GET['commentid']);
            if ($_GET['commentid'] != NULL) {
                $reports++;
                $newReport = $reportingManager->add($_GET['postid'], $_GET['commentid'], $_GET['authorname'], $_GET['titlepost']);
                $updateNbReports = $commentManager->update($reports, $_GET['commentid']);
                if ($newReport === false && $updateNbReports == false) {
                    throw new Exception('Impossible de signaler le commentaire !');
                } else {
                    header('Location: index.php?action=postView&id='. $_GET['postid'] . '&titlepost=' . $_GET['titlepost']);
                }
            }
        } else {
        }
    }
    public function getComments() {
        require 'view/frontend/postView.php';
    }

}