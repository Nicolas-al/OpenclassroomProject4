<?php  ob_start(); ?>

<section>
    <div>
    <h1> 
    je suis pas d'accord
    <?= var_dump($getPost) ?>
    </h1>
    <p> salut </p>
    </div>
</section>
<?php 
$content = ob_get_clean();

require_once('template.php');
?>