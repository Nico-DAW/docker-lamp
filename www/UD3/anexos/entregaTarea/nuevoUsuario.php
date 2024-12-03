<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Gestión usuario</h2>
                </div>

                <div class="container justify-content-between">
                    <?php
                        include_once('utils.php');
                        $id = $_GET['id'];
                        $username = $_GET['username'];
                        $nombre = $_GET['nombre'];
                        $apellidos = $_GET['apellidos'];
                        $contrasena = $_GET['contrasena'];
                       
                        include_once('pdo.php');
                        $resultado = nuevoUser($_GET['id'],$_GET['username'],$_GET['nombre'],$_GET['apellidos'],$_GET['contrasena']);
                        //Debug - var_dump($resultado);
                       
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php');
    ?>
    
</body>
</html>