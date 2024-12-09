<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--header-->
    <?php 
    include_once('../vista/header.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php 
            include_once('../vista/menu.php');
            ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Título del contenido</h2>
                </div>
                <div class="container">
                    <!--<p>Aquí va el contenido </p>-->
                    <?php
                    $fecha = date("Y-m-d");
                    //echo $fecha; 
                    ?>
                     <form action="usuario.php" method="GET" class="mb-5">
                     <input type="hidden" name="id" id="id" class="form-control">
                    <div class="mb-3">
                        <label for="userNam" class="form-label">Nombre de usuario</label>
                        <input type="text" name="userNam" id="userName" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" name="pass" id="pass" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" name="fecha" id="fecha" min="2000-01-01" max="<?php echo date('Y-m-d')?>" value="" class="form-control">
                    </div>
                    <div class="mb-3">  
                        <label for="color"  class="form-label">Elije un color</label>  
                        <select name="color" id="color" class="form-select">
                            <option value="" selected disabled>Seleccione una opcion</option>
                            <option value="rojo">Rojo</option>
                            <option value="azul">Azul</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <p>Seleccione una fruta</p>
                        <input type="radio" name="fruit" value="manzana"/> Manzana

                        <input type="radio" name="fruit" value="banana"/> Banana

                    </div>
                    <div class="mb-3"> 
                    <p>De que vehículo dispones?</p>
                    <input type="checkbox" name="vehiculo1" id="vehiculo1" value="bici"/>
                    <label for="vehiculo1">Tengo bici</label><br>
                    <input type="checkbox" name="vehiculo2" id="vehiculo2" value="coche"/>
                    <label for="vehiculo2">Tengo coche</label><br>
                    <input type="checkbox" name="vehiculo3" id="vehiculo3" value="barco"/>
                    <label for="vehiculo3">Tengo barco</label><br>
                    </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </main>
                </div>
            </div>
    <!--footer-->
    <?php 
    include_once('../vista/footer.php');
    ?>
</body>
</html>