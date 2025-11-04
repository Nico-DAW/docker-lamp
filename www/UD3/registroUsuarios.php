<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - UD3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar .nav-link {
            color: #198754;
        }
        .sidebar .nav-link:hover {
            color: darkgreen; /* optional hover effect */
        }
        .bg-dark {
            background-color: #c4c8cc !important;
        }
    </style>
</head>
<body>
    
    <?php 
    include_once("header.php");
    include_once("lib/db.php"); 
        /*
        $conexion = conecta();
        $crea = crea_db($conexion, "tienda");
        */
    ?>

       <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include_once("menu.php");?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Registro Usuarios</h2>
                </div>
                <div class="container">
                    <form class="mb-5" action="nueva.php" method='POST'>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edad</label>
                            <input type="text" class="form-control" name="edad">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provincia</label>
                            <input type="text" class="form-control" name="provincia">
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                        <br>
                        &nbsp;
                        <div class="mb-3">
                        <?php if(isset($_GET['mensaje'])){
                            echo '<div class="alert alert-info" role="alert">'.$_GET['mensaje'].'</div>';
                         }
                        ?>
                    </div>
                    </form>
                </div>

            </main>
        </div>
    </div>
    <?php 
    include_once("footer.php");
    ?>
</body>
</html>  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
