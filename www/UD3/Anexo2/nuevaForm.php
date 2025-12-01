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
                    <h2>Nueva Tarea</h2>
                </div>
                <div class="container">
                    <form class="mb-5" action="nueva.php" method='POST'>
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control" name="titulo" value=<?php echo isset($titulo)&&!empty($titulo)?$titulo:'';?>>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value=<?php echo isset($descripcion)&&!empty($descripcion)?$descripcion:'';?>>
                        </div>
                        <!-- 
                            Ejemplo de formulario con botones de radio (radio buttons)
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                <label for="male">Masculino</label>
                                <input class="form-check-input" type='radio' name="gender" id="male" value="Masculino">
                                </div>
                                <div class="form-check form-check-inline">
                                <label for="female">Femenino</label>
                                <input class="form-check-input" type='radio' name="gender" id="female" value="Femenino">
                                </div>
                            </div>
                        -->
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-select" name="estado">
                                <option value="en_curso">En curso</option>
                                <option value="end">Finalizada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Usuario</label>
                        <select class="form-select" name='usuario'>
                            <?php
                            require_once('modelo/mysqli.php');
                            $users = listaUsuarios();
                            
                            //var_dump($users); 
                            if(!empty($users)&&$users[0]==true):
                                foreach($users[1] as $user): 
                            ?>
                            <!-- Aquí podemos enviar el id por value -->
                            <option value=<?= $user['username'] ?><?php echo isset($username)&&$username==$user['username']?'selected':'';?>><?= $user['username']?></option>
                            <?php 
                                endforeach;
                            else:
                               echo "<option>Es necesario crear incialmente un usuario</option>";
                            endif;
                            ?>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <br>
                        &nbsp;
                        <div class="mb-3">
                        <?php if(isset($_GET['mensaje'])){
                            echo '<div class="alert alert-info" role="alert">'.$_GET['mensaje'].'</div>';
                         }
                        ?>
                    </div>
                    </form>
                </div>

            </main>
        </div>
    </div>
    <!--footer-->
    <?php include_once("footer.php");?>
</body>
</html>