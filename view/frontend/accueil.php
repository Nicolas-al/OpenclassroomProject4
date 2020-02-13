<?php  ob_start(); ?>
<section class="section_intro">
    <div id="block_intro">
        <div id="logo">
            <img src="public/icons8-plume-avec-encrier-128.png" id="feather" />
            
            <img src="public/icons8-clavier-80.png" id="keyboard"/>
        </div>  
        <div id="content_intro">
            <h2> De la plume à la machine</h2>
            <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>
        </div>    
    </div>
    <aside class="mini">
            <div>
                 <img src="public/cartegeneralealaska.jpg" />
            </div>
            <a href="https://fr.wikipedia.org/wiki/Alaska"><p>L’Alaska est le 49e État des États-Unis, dont la capitale est Juneau et la plus grande ville Anchorage, où habite environ 40 % de la population de l'État...</p></a>
    </aside> 
</section>

<section class="section_posts"> 
    <div class="block_title">
        <div class="icon_iceberg">
            <img src="public/icons8-iceberg-100.png" />
        </div>
        <h1 id="title_book">Voyage en Alaska</h1>
    </div>
<?php

    while ($data = $getPosts->fetch())
    { 

    ?>
    <div class="chapter">
        <div class="block_title_chapter">
            <div class="title_chapter">
                <h1><?= htmlspecialchars($data['title']); ?> </h1>
            </div>
            <div class="post_date">
                <p> Posté le <?= $data['date_p']; ?></p>
            </div>
            <div class="post_link">
                <a href="index.php?action=postView&amp;id=<?= $data['id'] ?>"> voir la suite </a>
            </div>    
        </div>
        <div class="content">
            <p><?= htmlspecialchars($data['content'])?> </p>
        </div>
    
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
   
