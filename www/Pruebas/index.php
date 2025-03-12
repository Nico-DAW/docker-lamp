<?php 
   $prueba='dark';
   //setcookie('prueba', $prueba, time() + (86400 * 30), "/");
   setcookie('prueba', $prueba, time() - (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "<h1>Hello</h1>"; 
    //echo $_COOKIE['prueba'];
    //print_r($_COOKIE);
    $favorito = true; 
    if($favorito){
    echo '<img src="./consejos-imagenes.jpg" width="100">';
    }
    echo __DIR__ ;
    include_once __DIR__.'/../index.php';
    
    ?>
</body>
</html>