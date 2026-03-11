<?php 
require_once("config/utils.php");
require_once("config/database.php");
require_once("models/Autorizacion.php");
Conexion::singleInst()->getConnection();
Conexion::singleInst()->creaDB("juegos");
//Conexion::singleInst()->creaTablas();
Autoriza::compruebaSesion();
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

        table {
          display: flex;
          flex-direction: column;
          width: 100%;
          border-collapse: collapse;
          font-family: Arial, sans-serif;
        }

        /* Cabecera y cuerpo en columna */
        thead, tbody {
          display: flex;
          flex-direction: column;
          width: 100%;
        }

        /* Cada fila es un contenedor flex */
        tr {
          display: flex;
          width: 100%;
        }

        /* Celdas */
        th, td {
          flex: 1;                /* Todas las columnas mismo tamaño */
          padding: 10px;
          border: 1px solid #ccc;
          text-align: left;
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
         <table>
            <thead>
                 <tr>
                     <th> Titulo</th>
                     <th> Descripcion</th>
                     <th> Tiempo de juego</th>
                 </tr>
            </thead>
            <tbody>
                <tr><td> Titulo de ejemplo</td>
                <td> Ejemplo de descripcion</td>
                <td> 160h</td></tr>
            </tbody>
         </table>
     </div>
    <?php if($_SESSION['rol']=="Admin"):?>
    <div>
         <p>Panel de administración</p>
         <a href=""><button>Crear nuevo juego</button></a>
    </div>
    <?php endif;?>
</body>
</html>
