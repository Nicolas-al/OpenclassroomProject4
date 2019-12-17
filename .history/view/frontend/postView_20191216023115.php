<?php  ob_start(); ?>

<section>
    <div>
    <h1> 
    je suis pas d'accord
    </h1>
    </div>
</section>
<?php 
$content = ob_get_clean();

require('template.php');
?>