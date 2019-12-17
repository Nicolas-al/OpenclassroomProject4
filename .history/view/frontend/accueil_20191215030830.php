

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
        <div>
            <p><?= htmlspecialchars($data['content'])?> </p>
        </div>
    
    </div>
    <?php
}
?>
</section>
<?php
$content = ob_get_clean();

require('template.php');
    ?>
   
