

    <?php  ob_start();
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
   
    
    </body>
</html>