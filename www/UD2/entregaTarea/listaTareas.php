<?php
session_start(); // Iniciamos la sesión para recuperar las variables de $_SESSION
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Listado Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--header-->
    <?php
    include_once("header.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php 
            include_once("menu.php");
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Listado de Tareas</h2>
                </div>
                <div class="container">
                    <!--<p>Aquí va el contenido </p>-->
                    <div class="table">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>                            
                                    <th>Identificador</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /* Aquí refactorizamos... antes tenía aquí directamente el contenido de la función mostrarAlmacen() 
                                if(isset($_SESSION['almacen'])){
                                    foreach($_SESSION['almacen'] as $tarea){
                                        echo '<tr>';
                                        echo '<td>'.$tarea['id'].'</td>';
                                        echo '<td>'.$tarea['descripcion'].'</td>';
                                        echo '<td>'.$tarea['estado'].'</td>';
                                        echo '</tr>';
                                    }
                                };
                                Según el enunciado del ejercicio: 

                                6. Crea un fichero listaTareas.php que recupere las tareas (de utils.php) y las muestre
                                a modo de tabla. Deberás crear un bucle para generar cada una de las filas.
                                */
                                include_once("utils.php");
                                if(isset($_SESSION['almacen'])){
                                mostrarAlmacen();
                                }
                                ?>
                                <tr>
                                    <td></td>
                                </tr>
                                <!--echo "<p>Nombre: $nombre</p>";-->
                            </tbody>
                        </table>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php 
        include_once("footer.php");
    ?>
</body>
</html>