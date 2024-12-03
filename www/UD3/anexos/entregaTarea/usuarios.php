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
                    <h2>Usuarios</h2>
                </div>

                <div class="container justify-content-between">
                    <?php
                    include_once('pdo.php');
                    $usuarios = listaUsuarios();
                    if( $usuarios === null){
                        echo "<p class=\"alert alert-danger\" role=\"alert\">No existen usuarios registrados.</p>";
                    }else{
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="">';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Username</th>';
                        echo '<th>Nombre</th>';
                        echo '<th>Apellidos</th>';
                        echo '<th>Contraseña</th>';
                        echo '<th>TO DO</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        // Recorrer y mostrar cada donante
                        foreach ($usuarios as $usuario) {
                            echo '<tr>';
                                echo '<td>' . htmlspecialchars_decode($usuario['id']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($usuario['username']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($usuario['nombre']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($usuario['apellidos']) . '</td>';
                                echo '<td>' . htmlspecialchars_decode($usuario['contrasena']) . '</td>';
                                echo '<td>';
                                    echo '<a class="btn btn-sm btn-outline-success me-2" href="editaUsuarioForm.php?id=' . $usuario['id'] . '" role="button">Editar</a>';
                                    echo '<a class="btn btn-sm btn-outline-danger" href="borraUsuario.php?id=' . $usuario['id'] . '" role="button">Borrar</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                        } 
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php');
    ?>
    
</body>
</html>