<?php ob_start(); ?>

<section class="login_admin">
    <form action="index.php?action=adminConnect" method="POST">
        <label for="pseudo"> Pseudo </label><br />
        <input type="text" name="pseudo" id="pseudo" required/><br />
        <label for="password"> Mot de passe </label><br />
        <input type="password" name="password" id="password" required/><br />
        <button type="submit" id="button"> se connecter </button>
    </form> 
</section>

<?php $content = ob_get_clean();

require('view/frontend/template.php');
