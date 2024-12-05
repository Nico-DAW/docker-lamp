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
                    <h2>Gestión de usuario</h2>
                </div>

                <div class="container justify-content-between">
                    <?php
                        require_once('utils.php');
                        $titulo = $_POST['titulo'];
                        $desc = $_POST['descripcion'];
                        $estado = $_POST['estado'];
                        $usuario = $_POST['usuario'];
                        $valido = true;
                        if (!esCampoValido($titulo))
                        {
                            $valido = false;
                        }
                        if (!esCampoValido($desc))
                        {
                            $valido = false;
                        }
                        if (!esCampoValido($estado))
                        {
                            $valido = false;
                        }
                        if (!esCampoValido($usuario))
                        {
                            $valido = false;
                        }
                        /* 
                        Esta comprobación no es necesaria 
                        if (!guardar($titulo, $desc, $estado, $usuario))
                        {
                            $validao = false;
                        }
                        */
                        if ($valido)
                        {
                            /*
                            echo "<p>La tarea $id se almacenó correctamente:</p>";
                            echo "<ul><li>Descripción: $desc</li><li>Estado: $estado</li></ul>";
                            */
                            include_once('mysqli.php');
                            guardaNueva($titulo, $desc, $estado, $usuario);
                            echo '<div class="alert alert-success" role="alert">Tarea guardada correctamente.</div>';
                            }
                        else
                        {
                            echo '<p class=\"alert alert-danger\" role=\"alert\">Alguno de los campos no es válido.</p>";';
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
