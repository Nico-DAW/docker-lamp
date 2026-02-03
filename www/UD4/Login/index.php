<?php session_start();
 if(!isset($_SESSION['email'])){
    header("Location:login.php");
    exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Página de inicio</h2>
    <?php 
    // echo $_SESSION['email'];
    // print_r($_SESSION);
    // Los valores almacenados en la variable de sesion $_SESSION se almacenan en en el servidor no en el navegador. 
    echo $_GET['mensaje'];
    ?>
</body>
</html>