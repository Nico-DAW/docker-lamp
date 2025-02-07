<?php require_once('../session.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD4. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        $estado = isset($_GET['estado']) ? $_GET['estado'] : null;
                        $id_usuario = $_GET['id'];
                        require_once('../modelo/pdo.php');
                        $resultado = listaTareasPDO($id_usuario, $estado);
                    }
                    else
                    {
                        require_once('../modelo/mysqli.php');
                        $resultado = listaTareas();
                    }
                    
                    if ($resultado && $resultado[0])
                    {
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
                                        foreach ($lista as $tarea)
                                        {

                            echo '<tr><th>Título:</th><td>'.$tarea['id'].'</td></tr>';
                            echo '<tr><th>Descripción:</th><td>'.$tarea['titulo'].'</td></tr>';
                            echo '<tr><th>Estado:</th><td>'.$tarea['descripcion'].'</td></tr>';
                            echo '<tr><th>Usuario:</th><td>'.$tarea['id_usuario'].'</td></tr>';
                        }
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