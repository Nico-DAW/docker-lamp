<?php 
require_once("config/utils.php");
compruebaSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        header{
            background-color: #ffae16;
        }

        nav{
            display:flex;
            justify-content: center;
        }

        nav ul{
            display: flex;
            gap:15px;
            list-style: none;
        }

        nav ul li a{
            text-decoration: none;
            color: #ffff;
            font-weight: bold;
        }

        .dashboard{
            margin:auto;
            width:70%;
        }

    </style>
</head>
<body>
    <?php require_once("views/header.php");?>
    <div class="dashboard">
     <div>
         <h2>Bienvenido <?=  $_SESSION['username']?></h2>
         <hr>
         <p>Panel de juegos</p>
     </div>
    <?php if($_SESSION['rol']=="Admin"):?>
    <div>
         <p>Panel de administración</p>
         <a href=""><button>Crear nuevo juego</button></a>
    </div>
    <?php endif;?>
</body>
</html>
