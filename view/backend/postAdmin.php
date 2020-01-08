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

<section id="writePost">
    <form>
        <label for="title"> Titre :</label><br />
        <input type="text" name="title" id="title" value="<?= $post['title'] ?>"/><br />
        <label for="content"> Contenu :</label><br />
        <textarea id="content" name="content" id="content" rows="9" cols="150" ><?= $post['content'] ?></textarea><br />

    </form>    
</section>

<?php

$content = ob_get_clean();

require('view/frontend/template.php');
