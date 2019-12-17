<?php  ob_start(); ?>

<section>
    <div>
    <h1> <?= $getPost['title']?>
    </h1>
    </div>
</section>
<?php 
$content = ob_get_clean();

require('template.php');
?>