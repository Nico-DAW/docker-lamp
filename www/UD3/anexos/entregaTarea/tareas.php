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
                    <h2>Tareas</h2>
                </div>

                <div class="container justify-content-between">
                    <?php
                    include_once('pdo.php');
                    //Debug --> var_dump(listaTareasUsuario(5)[]);
                    //var_dump(listaTareasUsuario($_POST['usuario']));
                    include_once('mysqli.php');
                    //$tareas = listaTareasUsuario($_POST['usuario']);
                   
                    //... Bueno ... Si usuarios isset() una y sino la otra -->
                    if(isset($_POST['usuario'])){
                        $tareas = listaTareasUsuario($_POST['usuario']);
                    }else{
                        $tareas = listaTareas();
                    }
                    //$tareas = listaTareas();
                    //var_dump($tareas);
                    if($tareas === false){
                        echo "<p class=\"alert alert-danger\" role=\"alert\">No existen tareas registradas.</p>";
                    }else{
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="">';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Título</th>';
                        echo '<th>Descripción</th>';
                        echo '<th>Estado</th>';
                        echo '<th>Usuario</th>';
                        echo '<th>Acciones</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        // Recorrer y mostrar cada donante
                       
                        foreach ($tareas as $tarea) {
                            echo '<tr>';
                                echo '<td>' . htmlspecialchars_decode($tarea['id']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($tarea['titulo']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($tarea['descripcion']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($tarea['estado']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($tarea['nombre']) . '</td>';
                                echo '<td>';
                                    echo '<a class="btn btn-sm btn-outline-success me-2" href="editaTareaForm.php?id=' . $tarea['id'] . '" role="button">Editar</a>';
                                    echo '<a class="btn btn-sm btn-outline-danger" href="borrarTarea.php?id=' . $tarea['id'] . '" role="button">Borrar</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        // Debug - var_dump($tareas);
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                        } 
                    ?>
                </div>
            </main>
        </div>
        <br>
    </div>

    <?php include_once('footer.php');
    ?>
    
</body>
</html>
