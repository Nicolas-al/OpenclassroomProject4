<?php  ob_start(); ?>
<section>
    <div>
    <h1> 
    </h1>
    <p> salut </p>
    </div>
</section>
<?php 
$content = ob_get_clean();

require('template.php');
?>
