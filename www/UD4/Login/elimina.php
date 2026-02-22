<?php 
session_start();
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
    session_unset();
    echo "Se han eliminado las variables de session";
   //session_destroy();
    print_r($_SESSION);
    ?>

    
</body>
</html>