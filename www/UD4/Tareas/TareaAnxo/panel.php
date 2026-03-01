<?php 
require_once("config.php");

requiereLogin();

if(isset($_GET['success'])){
    echo $_GET['success'];
}
/*
Que nos vamos a encontrar en panel... Lo clásico una zona de administrador y otra de usuario en función del rol.
Previamente habremos definido el tema del sitio ya en la página del login conuna cookie. 
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .themeLogout{
            font-size:small;
        }
    </style>
</head>
<body>
    <h2>Bienvenido/a! <?= ucfirst($_SESSION['nombre'])?></h2>
    <h6>Privilegios: <?= $_SESSION['rol'] ?></h6>

    <!-- En función del rol veremos una parte de la web u otra -->
     <?php if($_SESSION['rol']=='admin'): ?>
        <p>Eres admin y por lo tanto verás esto: ❤️</p>
     <?php else: ?>
        <p>No eres admin y por lo tanto verás esto otro: 🙉</p>
     <?php endif; ?>
     <hr>
     <p class="themeLogout">
        <a href="#">Cambiar Tema</a>
        <a href="logout.php">Cerrar Sesión</a>
     </p>
</body>
</html>