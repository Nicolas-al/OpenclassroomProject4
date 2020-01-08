<?php ob_start(); ?>

    <h1>Voyage en Alaska</h1>
    <div>
        <a href="index.php?action=loginAdmin"><button>Connexion</button></a>
    </div>    

<?php  $header = ob_get_clean(); ?>
<?php  ob_start(); ?>
<section>
    <div>
    <h1><?= $post['title'] ?> 
    </h1>
    <p class="content"><?= $post['content']?></p>
    
    </div>
  
</section>
<form action="index.php?action=addComment&amp;id=<?= $post['id'];?>" method="POST"> 
    <div class="form-group">
        <label for="form-pseudo" class="text-white">Votre pseudo <span>(en moins de 255 caractères)</span></label>
        <input type="text" class="form-control" name="form-pseudo" id="form-pseudo" placeholder="Pseudo" required>
    </div>
    <div class="form-group">
        <label for="form-comment" class="text-white mt-2">Votre commentaire</label>
        <textarea class="form-control" name="form-comment" id="form-comment" rows="3" placeholder="Commentaire" required></textarea>   
    </div>
    <div class="form-group">
        <button type="submit" class="button">Envoyer</button>
    </div>     
</form>
<?php

foreach($comments as $comment){


    ?>
    <div>
   <p><?= $comment['comment'] ?>
    </div>
    <?php 
}
    
$content = ob_get_clean();

require('template.php');

