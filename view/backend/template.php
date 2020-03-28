<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>Jean Rochefort</title>
        <link type="text/css" rel="stylesheet" href="public/css/style.css" />
        <link type="text/css" rel="stylesheet" href="public/css/responsive.css" />
        <link type="text/css" rel="stylesheet" href="public/css/content.css" />
        <link href="https://fonts.googleapis.com/css?family=Caveat|Libre+Baskerville|Lobster&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/jor5gzce56og2y1p3i8nd1rwjlw54zr2hlwjk7xpkuowlax0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://kit.fontawesome.com/f609b4f9a4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="public/js/deleteCom.js"></script>
        <script src="public/js/deletePost.js"></script>
        <script src="public/js/header.js"></script>
        <script src="public/js/setAdmin.js"></script>
        <script src="public/js/homeAdmin.js"></script>
        <script src="public/js/moderate.js"></script>
    </head>
    <body>
    <header id="header_back">
        <div class="header_left">
            <div id="pseudo">
                <h3><?php if(isset($_GET['action']) && $_GET['action'] === 'homeAdmin'){ echo 'Bienvenue ';}?><?= $adminName ?></h3>
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
                <a href="index.php?action=disconnect"><img src="public/logos/icons8-déconnexion-50.png" /></a>
                <p><span>Deconnexion</span></p>
            </div>
            <?php if (isset($_GET['action']) && $_GET['action'] != 'infosAdmin')
            { ?>
            <div class="block_btn_infos">
                <div class="btn_infos">
                    <i class="fas fa-sort-down"></i>
                    <div id="background_modal"></div>
                    <a href="index.php?action=infosAdmin&id=<?= $_GET['id'] ?>">Informations Personnelles</a>
                </div>
            </div>
            <?php
            } ?>
        </div>
        
    </header>
    <section>
    <h1 id="title_book_admin">Billet simple pour l'Alaska</h1>
    
        <?= $content ?>
        
    </section>    
    <footer>
        <p> Tous droits réservés © Nicolas ALLIAUME 2019 - Formation Openclassrooms - Développeur Web Junior - Projet n°4 : Créez un blog pour un écrivain </p>
    </footer>

    <script type="text/javascript">
 tinymce.init({
        selector: 'textarea#tiny_text_area',
        height: 600,
        valid_elements : "em/i,strike,u,strong/b,div[align],br,p[align],-ol[type|compact],-ul[type|compact],-li",
        entity_encoding : "raw",
        body_id : 'tiny_text_area',
        plugins: [ 'code', 'lists' ],
        mobile: {
        menubar : true,
        plugins: [ 'autosave', 'lists', 'autolink' ],
        toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
        },
        plugins : "importcss" ,
        content_css : 'public/css/content.css',
      })
    </script>

    </body>
</html>