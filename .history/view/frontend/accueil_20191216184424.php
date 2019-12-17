

    <?php  ob_start(); ?>

<section class="Post"> 

<?php

    while ($data = $getPosts->fetch())
{ 
    ?>
    <div class="chapter">
        <div class="title">
            <h1><?= htmlspecialchars($data['title']); ?> </h1>
        </div>
        <div class="content">
            <p><?= htmlspecialchars($data['content'])?> </p>
        </div>
        <a href="./index.php?action=postView&amp;id=<?=$data['id']?>"> voir la suite </a>
    
    </div>
    <?php
}
$getPosts->closeCursor();

?>
</section>
<?php
$content = ob_get_clean();

require('template.php');
    ?>
   
