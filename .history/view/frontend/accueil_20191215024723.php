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
    <h1><?= echo htmlspecialchars($data['title']);  ?> </h1>

    <?php
}
    ?>
   
    
    </body>
</html>