<?php $data = $getData->fetch();
?>
<?php  ob_start(); 
echo $data['name'] . '&nbsp' . $data['first_name'];
$adminName = ob_get_clean();
?>

<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=homeAdmin&id=<?= $data['id']?>"><i class="fas fa-undo"></i></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>

<?php  ob_start(); ?>
<hr>
<section id="write_post">
    <form method="post" action="index.php?action=<?php if (!isset($_GET['id'])){ echo 'addPost&posted=true';} else{ echo 'savePost&id=' . $_GET['id'] . '&posted=true';} ?>">
        <div class="block_title">
            <label for="title"> Titre :</label><br />
            <input type="text" name="title" id="title" placeholder="écrivez un titre" value="<?php if (isset($post['title'])){ echo $post['title']; } else { echo "";} ?>"/><br />
        </div>
        <div class="block_content">
            <label for="tiny_text_area"> Rédigez le contenu avec l'editeur de texte ci-dessous</label><br />
            <textarea name="tiny_text_area" id="tiny_text_area" rows="9" cols="50" ><?php if (isset($post['content'])){ echo $post['content']; } else { echo "";} ?></textarea><br />
        </div>
        <div class="input_bottom">
            <input type="submit" formaction="index.php?action=deletePost&id=<?= $post['id']?>" value="supprimer"/>
            <input type="submit"  formaction="index.php?action=<?php if (!isset($_GET['id'])){ echo 'addPost&posted=false';} else{echo 'savePost&id=' . $_GET['id'] . '&posted=' . $post['posted'];} ?>" value="enregistrer"/>
            <input type="submit" formaction="index.php?action=savePost&id=<?= $_GET['id'] ?>&posted=false" value="dépublier"/>
            <input type="submit" name="add_post"  id="add_post" value="publier"/>

            <!-- <div id="delete_post">
                <a href="index.php?action=deletePost&id=<?= $post['id']?>"><span>supprimer</span></a>
            </div> -->
        </div> 
    </form>
   
       
</section>


<?php

$content = ob_get_clean();

require('view/backend/template.php');
