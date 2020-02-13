<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Jean Forteroche</title>
        <link type="text/css" rel="stylesheet" href="public/css/style.css" /> 
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer+SC|Ibarra+Real+Nova&display=swap" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/cjks5lxllr4iyto9t16e6ilcfslvsldajn4jvsqk17g73cwx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://kit.fontawesome.com/f609b4f9a4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="public/js/zoom.js"></script>

    </head>
    <body>
    <header id="header_front">
        
        <?php if (isset($_GET['action']) && $_GET['action'] != 'accueil')
            {
                echo $homeReturn;
            } ?>
        <div id="author_name">
            <h1>Jean Forteroche </h1>
            <h2>(écrivain 2.0) ;)</h2>
        </div>                                 
        <div id="connect">
            <a href="index.php?action=loginAdmin">connexion</a>
        </div>
    </header>
        <?= $content ?>
       
    <footer>
        <p> Tous droits réservés © Nicolas ALLIAUME 2019 - Formation Openclassrooms - Développeur Web Junior - Projet n°4 : Créez un blog pour un écrivain </p>
    </footer>
    </body>
</html>