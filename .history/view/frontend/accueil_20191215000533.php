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
    <h1> S<?php echo $data['title'] ?> </h1>
    <?php
    }
    ?>
    
        <h1><?php  ?></h1>
    </body>
</html>