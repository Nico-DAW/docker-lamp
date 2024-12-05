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
                    <h2>Actualizar Tarea</h2>
                </div>

                <div class="container justify-content-between">
                    <?php 
                        
                        include_once('utils.php');
                        $id = $_GET['id'];
                        $titulo = $_GET['titulo'];
                        $descripcion = $_GET['descripcion'];
                        $estado = $_GET['estado'];
                        $nombre = $_GET['nombre'];
                        

                        $checkFlag = true;
                        
                        if(!valida($titulo)){
                        $checkFlag = false;
                        echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo del titulo.</p>";
                        };

                        if(!valida($descripcion)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo de descripcion.</p>";
                        };

                        if(!valida($estado)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo de estado</p>";
                        };

                        if(!valida($nombre)){
                            $checkFlag = false;
                            echo "<p class=\"alert alert-danger\" role=\"alert\">Revisa el campo del nombre</p>";
                        };

                        if($checkFlag){
                            //include_once('pdo.php');
                            include_once('mysqli.php');
                            $resultado = actualizaTarea($id, $titulo, $descripcion, $estado);
                            //Debug - var_dump($resultado);
                            if($resultado){
                                echo '<p class="alert alert-success" role="alert">Tarea actualizada correctamente.</p>';
                            }else{
                                echo '<div class="alert alert-danger" role="alert">Se ha producido un error actualizando la tarea.</div>';
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