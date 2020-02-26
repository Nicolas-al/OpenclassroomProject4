<!-- 

<?php ob_start(); ?>

<section id="createAdmin">
<form action="index.php?action=addAdmin" method="POST">
    <label for="name">Nom</label><br />
    <input type="text" name="name" id="name" required /><br />
    <label for="firstName">Prénom</label><br />
    <input type="text" name="firstName" id="firstName" required /><br />
    <label for="mail">Adresse email</label><br />
    <input type="email" id="mail" name="mail" required/><br />
    <label for="new_password">Nouveau mot de passe</label><br />  
    <input type="password" name="new_password" id="new_password" required /><br />
    <label for="confirmPass"> Condirmez votre mot de passe</label><br />
    <input type="password" name="confirmPass" id="confirmPass" required /><br />

    <button type="submit"> Validez </button>

</form>
</section>
<?php
// $sectionOne = ob_get_clean();

// require('template.php'); -->
