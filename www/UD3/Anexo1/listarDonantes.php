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
                    <h2>Listado Donantes</h2>
                </div>
                <div class="container">
                    <p></p>
                    <?php 
                    require_once("lib/init.php");
                    require_once("lib/utils.php");
                    $conexion = conecta();
                    selecciona_db($conexion, "donacion");
                    $donantes = listarDonantes($conexion); 
                    ?>
                    <div class="table">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Edad</th>
                                <th>Grupo</th>
                                <th>Código Postal</th>
                                <th>Móvil</th>
                                <th>Donar</th>
                                <th>Eliminar</th>
                                <th>Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($donantes as $donante){
                                    echo "<tr><td>".$donante['nombre']."</td><td>".$donante['apellidos']."</td><td>".$donante['edad']."</td><td>".$donante['grupo']."</td><td>".$donante['cp']."</td><td>".$donante['movil']."</td><td>"."<a class='btn btn-danger' href='#'> Donar </a>"."</td><td>"."<a class='btn btn-danger' href='#'> Eliminar </a>"."</td><td>"."<a class='btn btn-danger' href='#'> Registro </a>"."</td></tr>";
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
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