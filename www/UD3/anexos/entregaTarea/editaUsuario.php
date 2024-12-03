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
                    <h2>Actualiza usuario</h2>
                </div>

                <div class="container justify-content-between">
                    <p>Aquí va el contenido </p>
                    <?php
                        include_once('utils.php');
                        $id = $_GET['id'];
                        $username = $_GET['username'];
                        $nombre = $_GET['nombre'];
                        $apellidos = $_GET['apellidos'];
                        $contrasena = $_GET['contrasena'];

                        $checkFlag = true;
                        
                        if(!valida($username)){
                           $checkFlag = false;
                           echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo del username.</p>";
                        };

                        if(!valida($nombre)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo del nombre.</p>";
                        };

                        if(!valida($apellidos)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo del apellido</p>";
                        };

                        if(!valida($contrasena)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo de la contrasena de la contraseña.</p>";
                        };

                        if($checkFlag){
                            include_once('pdo.php');
                            $resultado = actualizaUsuario($id, $username, $nombre, $apellidos, $contrasena);
                            if($resultado){
                                echo '<p class="alert alert-success" role="alert">Usuario registrado correctamente.</p>';
                            }else{
                                echo '<div class="alert alert-danger" role="alert">Se ha producido un error registrando al usuario.</div>';
                            }
                        }else{
                            echo '<div class="alert alert-warning" role="alert">No se pudo procesar el contenido del formulario.</div>';
                        };


                        
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
