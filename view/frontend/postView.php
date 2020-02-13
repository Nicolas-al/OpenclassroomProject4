<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=accueil"><img src="public/icons8-retour-arrière-52.png" /></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>


<?php  ob_start(); ?>
<section id="block_chapter">
    <div class="icon_iceberg">
        <img src="public/icons8-iceberg-100.png" />
    </div>
    <h1 id="title_book">Voyage en Alaska</h1>

    <div id="post_block">
        <div>
            <h1 class="title_chapter"><?= $post['title'] ?> </h1>
            <p class="content"><?= $post['content']?></p>
        </div>
    </div>
</section>



<section id="form_section">
    <p> Laisser un commentaire : </p>
    <div id="form_block">
        <form action="index.php?action=addComment&amp;id=<?= $post['id'];?>" method="POST">
            <div class="form-group">
                <label for="form-pseudo" class="text-white">Votre pseudo <span>(en moins de 255
                        caractères)</span></label>
                <input type="text" class="form-control" name="form-pseudo" id="form-pseudo" placeholder="Pseudo"
                    required>
            </div>
            <div class="form-group">
                <label for="form-comment" class="text-white mt-2">Votre commentaire</label>
                <textarea class="form-control" name="form-comment" id="form-comment" rows="3" placeholder="Commentaire"
                    required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Envoyer</button>
            </div>
        </form>
    </div>
</section>



<section>
    <div id=comments_block>
        <?php foreach($comments as $comment)
{
        ?>
        <div id="comment_block">
            <div>
                <p><?= $comment['comment'] ?></p>
            </div>
            <div>
                <a
                    href="index.php?action=report&post_id=<?= $_GET['id'] ?>&comment_id=<?= $comment['id']; ?>&nb_reports=<?= $comment['nb_reports']?>"><button
                        type="button" id="btn_report"> signaler</button></a>
            </div>
        </div>
        <?php 
    }
    ?>
    </div>
</section>

<?php $content = ob_get_clean();

require('template.php');