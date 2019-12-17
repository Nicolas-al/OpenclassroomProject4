<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean Rochefort</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
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
   
    
    </body>
</html>