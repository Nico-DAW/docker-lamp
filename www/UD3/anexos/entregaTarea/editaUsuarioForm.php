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
                    <h2>Actualizar usuario</h2>
                </div>

                <div class="container justify-content-between">
                    <form action="editaUsuario.php" method="GET" class="mb-2 w-50">
                    <?php 
                    require_once('pdo.php');
                    if (!empty($_GET))
                    {
                        $id = $_GET['id'];
                        $resultado = buscaUsuario($id);
                        if (!empty($id) && $resultado[0])
                        {
                            $usuario = $resultado[1];
                            $id = $usuario['id'];
                            $username = $usuario['username'];
                            $nombre = $usuario['nombre'];
                            $apellidos = $usuario['apellidos'];
                            $contrasena = $usuario['contrasena'];
                           
                            ?>

                            
                            <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo $id ?>"/>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($username) ? htmlspecialchars($username) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellido</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo isset($apellidos) ? htmlspecialchars($apellidos) : '' ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="text" name="contrasena" id="contrasena" class="form-control" value="<?php echo isset($contrasena) ? htmlspecialchars($contrasena) : '' ?>" required/>
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