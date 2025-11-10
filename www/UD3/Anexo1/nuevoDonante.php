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
                    <h2>Nuevo Donante</h2>
                </div>
                <div class="container">
                    <p></p>
                    <?php 
                    require_once('lib/init.php');
                    ?>
                     <form class="mb-5" action="nuevo.php" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="edad">Edad</label>
                            <input type="number" class="form-control" name="edad">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="grupo">Grupo sanguineo</label>
                            <select class="form-select" name="grupo">
                                <option>0-</option>
                                <option>0+</option>
                                <option>A-</option>
                                <option>A+</option>
                                <option>B-</option>
                                <option>B+</option>
                                <option>AB-</option>
                                <option>AB+</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cp">Código Postal</label>
                            <input type="number" class="form-control" name="cp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Móvil</label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                        <button type="submit" class="btn btn-danger">Enviar</button>
                        <div class="mb-3">
                            <br>
                            <?php 
                                if(isset($_GET)&&!empty($_GET)){
                                $avisos=[];

                                if($_GET['mensajeBday']&&!empty($_GET['mensajeBday'])){
                                    $avisos[] = '<div class="alert alert-info" role="alert">'.$_GET['mensajeBday'].'</div>'; 
                                };
                                
                                if($_GET['mensajeDistr']&&!empty($_GET['mensajeDistr'])){
                                    $avisos[] = '<div class="alert alert-info" role="alert">'.$_GET['mensajeDistr'].'</div>'; 
                                }
                                
                                if($_GET['mensajeMov']&&!empty($_GET['mensajeMov'])){
                                    $avisos[] = '<div class="alert alert-info" role="alert">'.$_GET['mensajeMov'].'</div>';
                                }
                                
                                if($_GET['mensajeGoodWay']&&!empty($_GET['mensajeGoodWay'])){
                                    $avisos[] = '<div class="alert alert-info" role="alert">'.$_GET['mensajeGoodWay'].'</div>';
                                }

                                foreach($avisos as $aviso){
                                    echo $aviso;
                                }
                            }
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