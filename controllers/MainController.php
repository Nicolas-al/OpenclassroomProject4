<?php require_once('model/CommentManager.php');
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
                    header('Location: index.php?action=postView&id='. $_GET['id'] . '&titlepost=' . $_GET['titlepost']);
                }
            }
            elseif(isset($_POST['form-pseudo']) && $_POST['form-pseudo'] == "Admin" && isset($_POST['form-comment'])) {
                $newComment = $commentManager->add($_GET['id'], htmlspecialchars($_POST['form-pseudo']), htmlspecialchars($_POST['form-comment']));
                if ($newComment === false) {
                    throw new Exception('Impossible de s\'inscrire !');
                } else {    
                header('Location: index.php?action=postAdminView&id='. $_GET['id'] . '&titlepost=' . $_GET['titlepost']);
                }
            }
        }
    }
    public function addReport() {
        $reportingManager = new ReportingManager();
        $commentManager = new CommentManager();
        $postManager = new PostManager();
        $postId = $postManager->getPost($_GET['postid']);
        $commentId = $commentManager->get($_GET['commentid']);
        $reports = $_GET['nbreports'];
        var_dump($commentId);
  
        if (!empty($_GET['commentid'])) {
            $id = intval($_GET['commentid']);
            if ($_GET['commentid'] != NULL) {
                if (!empty($_GET['action']) && $_GET['action'] == 'report'){ 
                $reports++;
                $newReport = $reportingManager->add($postId['id'], $commentId['id'], htmlspecialchars($commentId['author']), $postId['title']);
                $updateNbReports = $commentManager->update($reports, $_GET['commentid']);
                    if ($newReport === false && $updateNbReports == false) { 
                        throw new Exception('Impossible de signaler le commentaire !');
                    } else { 
                        header('Location: index.php?action=postView&id='. $_GET['postid']);
                    }
                }
                elseif (!empty($_GET['action']) && $_GET['action'] == 'reportAdmin') {
                    $reports++;
                    $newReport = $reportingManager->add($postId['id'], $_GET['commentid'], 'Admin', $postId['title']);
                    $updateNbReports = $commentManager->update($reports, $_GET['commentid']);
                        if ($newReport === false && $updateNbReports == false) {
                            throw new Exception('Impossible de signaler le commentaire !');
                        } else { 
                            header('Location: index.php?action=postAdminView&id='. $_GET['postid']);
                        }
                }
            }
        } 
    }
    public function getComments() {
        require 'view/frontend/postView.php';
    }

}