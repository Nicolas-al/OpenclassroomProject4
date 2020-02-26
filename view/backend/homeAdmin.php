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
            <a href="index.php?action=postAdminView&amp;id=<?= $data['id']?>"> <?= $data['title'] ?> </a>
            <p class='post_status'><?php if ($data['posted'] == 1){ echo 'en ligne';} else{ echo 'non posté';} ?></p>
        </div>
        <div class="btn_modify">
            <a href="index.php?action=postAdmin&amp;id=<?= $data['id']?>"><button>modifier</button></a>
        </div>    
    </div>
    <?php
    }
    ?>
</section>
<hr>
<section id="block_comments">
        <h2>Commentaires Signalés</h2>
        <?php while ($report = $countReports->fetch())
        {
        ?>
        <div class="block_comment" id="<?= $report['post_id']?>">
            <div class="border_bottom">
                <div class="comment">
                    <div class="r_infos">
                        <p class="author_comment">posté le <?= $report['date_c']?> par <?= $report['author']?></p>
                        <p class="nb_reports"> <?= $report['nb_reports']?></p>
                    </div>
                    <div class="r_content">    
                        <p> <?= $report['comment']?></p>
                    </div>
                </div>
            </div> 
            <div class="icon_delete">
                <div onclick="deleteCom(<?=$report['comment_id']?>)"><img src="public/icons8-delete-bin-48.png" alt="poubelle rouge"/><span>Supprimer</span></div>
            </div>
            <div>
                <a href=""></a>
            </div>      
        </div>
        <?php     
        }
?>
</section>

<?php $content = ob_get_clean(); 
 
 require('view/backend/template.php');
