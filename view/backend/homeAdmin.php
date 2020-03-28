<?php  ob_start(); 
$data = $getData->fetch();
echo $data['name'] . '&nbsp' . $data['first_name'];
$adminName = ob_get_clean();
?>

<?php  ob_start(); ?>
    <div class="delete_msg">
        <p>le chapitre à bien été supprimé</p>
    </div>
<section id="chapters_list"> 
    <?php while ($data = $getPosts->fetch())
    { 
    ?>
    <div class="block_chapter">
        <div class="title_post">
            <p class='post_status'><?php if ($data['posted'] == 1){ echo 'en ligne';} else{ echo 'non posté';} ?></p>
            <a href="index.php?action=postAdminView&amp;id=<?= $data['id']?>"> <?= $data['title'] ?> </a>
            <div class="btn_modify">
                <a href="index.php?action=postAdmin&amp;id=<?= $data['id']?>"><button>modifier</button></a>
            </div> 
        </div>
           
    </div>
    <?php
    }
    ?>
</section>
<section id="block_comments">
        <h2>Commentaires Signalés</h2>
        <?php while($report = $reports->fetch())
        {
        ?>
        <div class="block_comment" id="<?= $report['comment_id']?>">
            <div class="width_block">
                <div onclick="moderate(<?=$report['comment_id']?>)" id="block_moderate">
                    <p> Modérer le signalement </p>
                </div>
                <div class="comment">
                    <div class="r_infos">
                        <p class="chapter_comment"><?= $report['chapter']?></p>
                        <p class="author_comment">posté le <?= $report['date_c']?> par <?= $report['author']?></p>
                        <p class="nb_reports"> <?= $report['nb_reports']?></p>
                    </div>
                    <div class="r_content">    
                        <p> <?= $report['comment']?></p>
                    </div>
                </div>
            </div>     
            <div class="icon_delete">
                <div onclick="deleteCom(<?=$report['comment_id']?>)" id="block_delete">
                    <img src="public/logos/icons8-delete-bin-48.png" alt="poubelle rouge"/><span>Supprimer</span>
                </div>
            </div>
                    
                     
        </div>
        <?php     
        }
?>
</section>

<?php $content = ob_get_clean(); 
 
 require('view/backend/template.php');
