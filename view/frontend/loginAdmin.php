<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=accueil"><i class="fas fa-undo"></i></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>
<?php ob_start(); ?>


<section id="login_admin">
    <h1> Se connecter </h1>
    <form action="index.php?action=adminConnect" method="POST">
        <div class="block_mail">
            <div class="input">
                <label for="mail"> Mail </label><br />
                <input type="mail" name="mail" id="mail" required/><br />
            </div>
            <p id="msg_mail"><?php if (!empty($_SESSION['erreurmail'])){ echo $_SESSION['erreurmail'] ;} ?></p>
        </div>
        <div class="block_pass">
            <div class="input">
                <label for="password"> Mot de passe </label><br />
                <input type="password" name="password" id="password" required/><br />
            </div>    
            <p id="msg_pass"><?php if (!empty($_SESSION['erreurpass'])){ echo $_SESSION['erreurpass'] ;} ?></p>

        </div>
        <button type="submit" id="button"> se connecter </button>
    </form> 
</section>

<?php $content = ob_get_clean();

require('view/frontend/template.php');
