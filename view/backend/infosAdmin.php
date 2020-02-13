<?php  ob_start(); 
$data = $getData->fetch();
echo $data['name'] . '&nbsp' . $data['first_name'];
$adminName = ob_get_clean();
?>

<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=homeAdmin&id=<?= $data['id']?>"><img src="public/icons8-retour-arrière-52.png" /></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>

<?php  ob_start(); ?>

<div class="block_infos">
    <h1> Mes informations personnels</h1>
    <div class="infos_mdp">
        <div class="infos">
            <div class="display_infos">
                <p>Nom : <span><?= $data['name']?></span></p>
                <p>Prénom : <span><?= $data['first_name']?></span></p> 
                <p>Mail : <span><?= $data['mail']?></span></p>
            </div>    
            <a href="#set_infos"><button class="btn_display_infos"> Modifer mes informations</button></a>
            <div class="background_modal"></div>
            <div id="block_set_infos">
                <div id="msg_errors_infos"></div>
                <div class="set_infos" id="set_infos">
                        <h2> Modifier informations</h2>
                        <div class="form_group">
                            <label for="set_name" class="label_form">Nouveau Nom : </label><br />
                            <input type="text" name="set_name" id="set_name" required /><br />
                        </div> 
                        <div class="form_group">   
                            <label for="set_firstName" class="label_form">Nouveau Prénom : </label><br />
                            <input type="text" name="set_firstName" id="set_firstName" required /><br />
                        </div>
                        <div class="form_group">
                            <label for="set_mail" class="label_form">Nouveau mail : </label><br />
                            <input type="email" id="set_mail" name="set_mail" required/><br /> 
                        </div>                      
                        <button id="btn_infosP">Valider</button>
                </div>
            </div>
        </div>


        <a href="#set_password"><button class="btn_display_password">Modifier mot de passe</button></a>
        <div class="background_modal"></div>
        <div id="block_set_password">
            <div id="msg_errors_password"></div>
            <div class="set_password" id="set_password">
                <h2> Modifier mot de passe</h2>
                <div class="form_group">
                    <label for="current_password" class="label_form">Mot de passe actuel</label><br />  
                    <input type="password" name="current_password" id="current_password" required /><br />    
                </div>   
                <div class="form_group">
                    <label for="new_password" class="label_form">Nouveau mot de passe</label><br />  
                    <input type="password" name="new_password" id="new_password" required /><br />
                </div>
                <div class="form_group">
                    <label for="confirm_password" class="label_form"> Condirmez votre mot de passe</label><br />
                    <input type="password" name="confirm_password" id="confirm_password" required /><br />
                </div>
                <button id="btn_password">Valider</button>

            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); 
 
 require('view/backend/template.php');