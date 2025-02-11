<?php require_once('../session.php'); 
/*
Se podría hacer así... pero mejor desde loginAuth.php
$_SESSION['usuario']['id']=$_GET['id'];

echo var_dump($_SESSION);
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD4. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .card {margin-bottom: 20px;};
        
    </style>
</head>
<body>

    <?php include_once('../vista/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../vista/menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Tarea</h2>
                </div>

                <div class="container justify-content-between">
                <?php

                    $resultado = null;
                    if (!empty($_GET))
                    {
                        $_SESSION['usuario']['tarea']=$_GET['id'];
                        /*Pruebas-->
                        var_dump($_SESSION['usuario']);
                        echo $_GET['id'];
                        */
                        require_once('../modelo/mysqli.php');
                        //var_dump(verFicheros($_SESSION['usuario']['id']));
                        //$_SESSION['usuario']['tarea'] = $_GET['id'];
                        $estado = isset($_GET['estado']) ? $_GET['estado'] : null;
                        $id_tarea = $_GET['id'];
                        //require_once('../modelo/pdo.php');
                        //require_once('../modelo/mysqli.php');
                        $resultado = detallesTarea($id_tarea);//listaTareasPDO($id_usuario, $estado);
                    }
                    /* Borrar
                    else
                    {
                        require_once('../modelo/mysqli.php');
                        $resultado = listaTareas();
                    }
                    */
                    if ($resultado && $resultado[0])
                    {
                        var_dump($_SESSION['usuario']);
                ?>  
                    <div class="card">
                    <h5 class="card-header">Detalles</h5>
                    <div class="card-body">
                        <div class="table">
                        <table  class="table table-bordered">
                        <?php
                                    $lista = $resultado[1];
                                    if (count($lista) > 0)
                                    {
                            echo '<tr><th>Título:</th><td>'.$lista['titulo'].'</td></tr>';
                            echo '<tr><th>Descripción:</th><td>'.$lista['descripcion'].'</td></tr>';
                            echo '<tr><th>Estado:</th><td>'.$lista['estado'].'</td></tr>';
                            echo '<tr><th>Usuario:</th><td>'.$lista['id_usuario'].'</td></tr>';
                            //Cada vez que se pase por aquí se actualiza
                            $_SESSION['usuario']['idUsuarioTarea'] = $lista['id_usuario'];
                            //Pruebas
                            var_dump($_SESSION['usuario']);
                        }
                    else
                    {
                        echo '<tr><td colspan="100">No hay tareas</td></tr>';
                    }
                        ?>
                        </table>
                        </div>
                    </div>
                    </div>
                    &nbsp;
                    <div class="card">
                    <h5 class="card-header">Archivos adjuntos</h5>
                    <div class="card-body">
                    <div class="container text-start">
                        <div class="row">
                <!--AQUI SE AÑADIRÁN MÁS ARCHIVOS-->
                            <?php 
                            $ficheros=verFicheros($_SESSION['usuario']['tarea']);
                            if($ficheros[0]){
                                foreach($ficheros[1] as $fichero){
                                    var_dump($fichero);
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">
                                    <?php echo $fichero['nombre'];?> 
                                    </h5>
                                    <p class="card-text"><?php echo $fichero['descripcion'];?> </p>
                                    <?php echo $fichero['nombre'] ?> 
                                    <button onclick="#" class="btn btn-outline-primary">Descargar</a></button>
                                    <button onclick="<?php borraFichero($fichero['nombre']);?>" class="btn btn-outline-danger">Eliminar</a></button>
                                    
                                    </div>
                                    </div>
                            </div>
                            <?php
                                //CIERRE DE FOREACH 
                                }
                            //CIERRE DE IF 
                            }
                            ?>
                            
                           
                                    
                                    
                            <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="card">
                                <a href="subidaFichForm.php" class="btn">
                                    <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <h4><i class="bi bi-plus-circle"></i></h4>
                                    <p class="card-text">Añadir nuevo archivo.</p>
                                    
                                    </div>
                                    </div>
                                    </a>
                            </div>
                <!--FIN CARD-->
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    &nbsp;
                <?php
                    }
                    else
                    {
                        echo '<div class="alert alert-warning" role="alert">' . $resultado[1] . '</div>';
                    }
                ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../vista/footer.php'); ?>
    
</body>
</html>