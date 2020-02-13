<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Jean Rochefort</title>
        <link type="text/css" rel="stylesheet" href="public/css/style.css" /> 
        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/cjks5lxllr4iyto9t16e6ilcfslvsldajn4jvsqk17g73cwx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://kit.fontawesome.com/f609b4f9a4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="public/js/deleteCom.js"></script>
        <script src="public/js/deletePost.js"></script>
        <script src="public/js/header.js"></script>
        <script src="public/js/setAdmin.js"></script>
        <script src="public/js/homeAdmin.js"></script>
    </head>
    <body>
    <header id="header_block">
        <div class="header_left">
            <div id="pseudo">
                <h3><?= $adminName ?></h3>
            </div>
            <?php if (isset($_GET['action']) && $_GET['action'] != 'homeAdmin')
            {
                echo $homeReturn;
            } ?>
        </div>    
        <div class="block_create_post">
            <a href="index.php?action=postAdmin"><i class="fas fa-plus"></i></a>
            <p> Nouveau billet </p>
        </div>
        <div class="block_btn">  
            <div class="disconnect">
                <a href="index.php?action=disconnect"><img src="public/icons8-déconnexion-50.png" /></a>
            </div>
            <?php if (isset($_GET['action']) && $_GET['action'] != 'infosAdmin')
            { ?>
            <div class="block_btn_infos">
                <div class="btn_infos">
                    <i class="fas fa-sort-down"></i>
                    <a href="index.php?action=infosAdmin&id=<?= $_GET['id'] ?>">Information Personnel</a>
                </div>
            </div>
            <?php
            } ?>
        </div>
        
    </header>
    <hr>
    <section>
    <h1 id="title_book">Billet simple pour l'Alaska</h1>
    
        <?= $content ?>
        
    </section>    
    <footer>
        <p> Tous droits réservés © Nicolas ALLIAUME 2019 - Formation Openclassrooms - Développeur Web Junior - Projet n°4 : Créez un blog pour un écrivain </p>
    </footer>

    <script type="text/javascript">
 tinymce.init({
        selector: '#tiny_text_area',
        height: 600,
        valid_elements : "em/i,strike,u,strong/b,div[align],br,p[align],-ol[type|compact],-ul[type|compact],-li",
        entity_encoding : "raw"

      })
    </script>

    </body>
</html>