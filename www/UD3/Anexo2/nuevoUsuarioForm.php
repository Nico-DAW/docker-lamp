<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once("header.php");?>
    <!--header-->
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include_once("menu.php");?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Nuevo usuario</h2>
                </div>
                <div class="container">
                    <?php 
                        /*
                        //Esto sería una manera de hacerlo recuperas los valores a través del id y dispones los valores en value:
                        //$username = $user[1]['username'];

                        require_once('modelo/pdo.php');
                        if(isset($_GET['id'])&&!empty($_GET['id'])){
                            $user = listausuario($_GET['id']);
                            print_r($user[1]);
                        }
                        // Pero la manera más sencilla es ya recuperarlos por GET de la paǵina anterior --> en el href del boton ?name=...$apellido=...
                        */
                        
                    ?>
                    <!-- 
                    En realidad 'edit'=true no hace falta. Sabemos que si recibimos un $id por GET se trata de una edición de usuario. Pero bueno... 
                    Recordar en value el echo antes del isset()
                    -->
                    <form action=<?php echo isset($_GET['edit'])&&!empty($_GET['edit'])?'nuevoUsuario2.php?edit=true&id='.$_GET['id']:'nuevoUsuario2.php'?> method="POST">
                        <div class="mb-3">
                        <input type='hidden' name='id' value=<?php isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:null?>/>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='username'>Username</label>
                        <input class="form-control" type='text' name='username' value=<?php echo isset($_GET['username'])&&!empty($_GET['username'])?$_GET['username']:null?>>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='nombre'>Nombre</label>
                        <input class="form-control" type='text' name='nombre' value=<?php echo isset($_GET['nombre'])&&!empty($_GET['nombre'])?$_GET['nombre']:null?>>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='apellidos'>Apellidos</label>
                        <input class="form-control" type='text' name='apellidos' value=<?php echo isset($_GET['apellidos'])&&!empty($_GET['apellidos'])?$_GET['apellidos']:null?>>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='contrasena'>Contraseña</label>
                        <input class="form-control" type='text' name='contrasena' value=<?php echo isset($_GET['contrasena'])&&!empty($_GET['contrasena'])?$_GET['contrasena']:null?>>
                        </div>
                        <div class="mb-3">
                        <button class="btn btn-primary"type="submmit">Enviar</button>
                        </div>



                    </form>
                    <?php 
                     if(isset($_GET['msgs'])&&!empty($_GET['msgs'])){
                        $msgs = $_GET['msgs'];
                        //var_dump($_GET['msgs']);
                        foreach($msgs as $msg){
                            echo "<div class='alert alert-danger role='alert'>$msg</div>";
                        }
                     }
                     /*
                     if(isset($_GET['success'])&&!empty($_GET['success'])){
                        $success = $_GET['success'];
                        echo "<div class='alert alert-success role='alert'>$success</div>";
                     }
                     */
                    if(isset($_GET['success'])&&!empty($_GET['success'])){
                        $success = $_GET['success'];
                        $msg = ''; 
                        $success[0]?$msg = "<div class='alert alert-success role='alert'>$success[1]</div>" : $msg = "<div class='alert alert-danger role='alert'>$success[1]</div>";
                        echo $msg;
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include_once("footer.php");?>
</body>
</html>