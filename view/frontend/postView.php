<?php ob_start(); ?>

<div class="home_return">
    <a href="index.php?action=accueil"><i class="fas fa-undo"></i></a>
</div>

<?php $homeReturn = ob_get_clean(); ?>


<?php  ob_start(); ?>
<section id="block_chapter">
    <div class="block_title">
        <div class="icon_iceberg">
            <img src="public/logos/icons8-iceberg-100.png" alt="iceberg"/>
        </div>
         <h1 id="title_book">Billet simple pour Alaska</h1>
    </div>

    <div id="post_block">
        <div>
            <h1 class="title_chapter"><?= htmlspecialchars($post['title']) ?> </h1>
            <p class="content"><?= htmlspecialchars($post['content'])?></p>
        </div>
    </div>
</section>

<section id="form_section">
    <p> Laisser un commentaire : </p>
    <div id="form_block">
        <form action="index.php?action=addComment&amp;id=<?= $post['id'];?>&titlepost=<?= $_GET['titlepost']?>" method="POST">
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



<section id="comments">
    <div id=comments_block>
        <h2>Commentaires</h2>
        <?php foreach($comments as $comment)
{
        ?>
        <div id="comment_block">
            <div class="border_bottom">
                <div class="comment">
                    <p class="title_comment"> posté par <span><?= $comment['author'] ?></span> le <?= $comment['date_c'] ?> </p>
                    <div class="line"></div>
                    <p class="content_comment"><?= $comment['comment'] ?></p>
                </div>
            </div>    
            <div class="report">
                <a href="index.php?action=report&postid=<?= $_GET['id'] ?>&commentid=<?= $comment['id']; ?>&nbreports=<?= $comment['nb_reports']?>"><button
                    type="button" id="btn_report">! signaler</button></a>
            </div>
        </div>
        <div id="line"></div>
        <?php 
    }
    ?>
    </div>
</section>

<?php $content = ob_get_clean();

require('template.php');