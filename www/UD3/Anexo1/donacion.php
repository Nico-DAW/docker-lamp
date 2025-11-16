<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3 - Donaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar .nav-link {
            color: #dc3545;
        }
        .sidebar .nav-link:hover {
            color: darkred; /* optional hover effect */
        }
        .bg-dark {
            background-color: #c4c8cc !important;
        }
    </style>
</head>
<body>
    <!--header-->
    <?php
     require_once('header.php');
    ?>

    <div class="container-fluid">
        <div class="row">
            <!--menu-->
                <?php
                 require_once('menu.php');
                ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Donación</h2>
                </div>
                <div class="container">
                    <p></p>
                    <?php 
                    require_once('lib/init.php');
                    ?>
                     <form class="mb-5" action="donar.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <!-- Acordarse del echo -->
                            <input type="text" class="form-control" name="nombre" value="<?php echo $_GET['nombre']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" value="<?php echo $_GET['apellidos']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <?php
                            /* 
                            (( Una reflexión en el camino -> en PHP empty(0) es true ))
                            Una manera de obtener la última fecha de donación de un usuario en caso de que exista. 
                            */
                                $conexion = conecta();
                                $lastFecha = 0; 
                                selecciona_db($conexion,"donacion");
                                if(!empty($_GET['id'])){
                                    $fecha = getFechaNext($conexion, $_GET['id']);
                                    /* Esto sería sino hiciésemos un MAX en la consulta -> 
                                    function getFechaNext($conexion, $id){
                                        $sql = "SELECT MAX(FechaNext) FROM historico WHERE donante=:donante";
                                        ... 
                                    $fechasLenght = count($fechas);
                                    if($fechasLenght != 0){
                                        $lastFecha = $fechas[$fechasLenght];
                                        echo $lastFecha;
                                    }
                                    */
                                    foreach($fecha as $key=>$value){
                                        //print_r($value); 
                                        $lastFecha=$value;
                                    }
                                };
                            /*
                            La otra manera es una consulta cruzada (que definiriamos en init.php -> en alguna función
                            ejemplo -> getFechaNext($conexion, $id)) o en la que devulve los valores en header(Location: )
                            SELECT id,nombre,apellidos,fechaNext FROM `donantes` d,`historico` h WHERE d.id=h.donante AND h.donante=;
                            Se retomará en este punto. Ahora se creara el metodo guardar donacion. 
                            */
                            ?>
                            <label class="form-label" for="fecha">Fecha donación</label>
                            <input type="date" class="form-control" name="fecha" min="<?php echo (isset($lastFecha)&&!empty($lastFecha))?$lastFecha:date("Y-m-d");?>">
                        </div>

                        <button type="submit" class="btn btn-danger">Enviar</button>
                        <div class="mb-3">
                            <br>
                            <?php 
                                
                            ?>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php
     require_once('footer.php');
    ?>
</body>
</html>