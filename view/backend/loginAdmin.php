<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=accueil"><img src="public/icons8-retour-arrière-52.png" /></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>
<?php ob_start(); ?>


<section class="login_admin">
    <h1> Se connecter </h1>
    <form action="index.php?action=adminConnect" method="POST">
        <div class="block_mail">
            <label for="mail"> Mail </label><br />
            <input type="mail" name="mail" id="mail" required/><br />
        </div>
        <div class="block_pass">
            <label for="password"> Mot de passe </label><br />
            <input type="password" name="password" id="password" required/><br />
        </div>
        <button type="submit" id="button"> se connecter </button>
    </form> 
</section>

<?php $content = ob_get_clean();

require('view/frontend/template.php');
