<?php 
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        };
    </style>
</head>
<body>
    <h2>Página de Login</h2>
    
    <!-- Comprobaciones
    <?php
    foreach($usuarios as $key=>$value){
        echo $key.'->';
        echo $value['rol'].'<br>';
    }
    ?>
    -->
    <p class=error>
    <?php
    if(isset($_GET['error'])){
        echo $_GET['error'];
    } 
    ?>
    </p>

    <form action="loginAuth.php" method="POST">
        <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"/>
        </div>
        <div>
        <label for=pass>Password:</label>
        <input type="password" name="pass" id="pass"/>
        </div>
        <input type="submit" value="Enviar"/>
    </form>
    
</body>
</html>