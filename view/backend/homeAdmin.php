<?php  ob_start(); ?>

<?php $data = $getAdmin->fetch();
?>
<aside id="pseudo">
    <h3><?= $data['name'] . '&nbsp' . $data['first_name'] ?></h3>
</aside>  
<section id="create_Admin">
        <a href="index.php?action=accueil"><button id="btnDisconect" > Déconnexion </button></a>
 </section>
<?php

$header = ob_get_clean();
?>
<?php  ob_start(); ?>

<section id="chapterList"> 
    <?php while ($data = $getPosts->fetch())
    { 
    ?>
    <div id="titlePost">
        <a href="index.php?action=postAdmin&amp;id=<?= $data['id']?>"> <?= $data['title'] ?> </a>
    </div>
    <?php
    }
    ?>
</section>

<?php $content = ob_get_clean(); 
 
 require('view/frontend/template.php');
