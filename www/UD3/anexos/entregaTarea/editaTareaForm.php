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
                <form action="editaUsuario.php" method="GET" class="mb-2 w-50">
                    <?php 
                    require_once('mysqli.php');
                    if (!empty($_GET))
                    {
                        $id = $_GET['id'];
                        $resultado = buscaTarea($id);
                        //Debug - var_dump($resultado);
                        if (!empty($id) && $resultado[0])
                        {
                            $tarea = $resultado[1];
                            $id = $tarea['id_usuario'];
                            $titulo = $tarea['titulo'];
                            $descripcion = $tarea['descripcion'];
                            $estado = $tarea['estado'];
                            $nombre = $tarea['nombre'];
                           
                            ?>

                            
                            <div class="mb-3">
                            <input type="hidden" name="id_usuario" value="<?php echo $id ?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo isset($titulo) ? htmlspecialchars($titulo) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo isset($descripcion) ? htmlspecialchars($descripcion) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" value="<?php echo isset($estado) ? htmlspecialchars($estado) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : '' ?>" required/>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                        <?php
                            }
                            else
                            {
                                echo '<div class="alert alert-danger" role="alert">No se pudo recuperar la información del usuario.</div>';
                            }
                        }
                        else
                        {
                            echo '<div class="alert alert-danger" role="alert">Debes acceder a través del listado de usuarios.</div>';
                        }
                        ?>
                    </form>
                    <br>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php');
    ?>
    
</body>
</html>