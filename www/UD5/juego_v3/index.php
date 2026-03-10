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
    </style>
</head>
<body>
    <?php require_once("views/header.php");?>
    <h2>Mis juegos</h2>
    <hr>
    <p>Dasboard juegos</p>
</body>
</html>
