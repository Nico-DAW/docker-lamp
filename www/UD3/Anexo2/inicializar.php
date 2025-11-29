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
                    <h2>Inicializar</h2>
                </div>
                <div class="container">
                    <?php 
                        require_once("modelo/init.php");
                        $resultDb = creaDB();
                        if($resultDb[2] == true){
                            echo "<div class='alert alert-danger' role='alert'>".$resultDb[1]."</div>";
                        }else{
                            if($resultDb[0] == false){
                                echo "<div class='alert alert-warning' role='alert'>".$resultDb[1]."</div>";
                            }else{
                                echo "<div class='alert alert-success' role='alert'>".$resultDb[1]."</div>";
                            }
                        }

                        $creaUsers = creaUsuarios();

                        if($creaUsers[0] != false){
                            echo "<div class='alert alert-success role='alert'>".$creaUsers[1]."</div>";
                        }else{
                            if($creaUsers[2] == true){
                                echo "<div class='alert alert-danger' role='alert'>".$creaUsers[1]."</div>";
                            }else{
                                echo "<div class='alert alert-warning' role='alert'>"."La tabla usuarios estaba creada"."</div>";
                            }
                        }

                        $creaTabla = creaTareas();

                        if($creaTabla[0] != false){
                            echo "<div class='alert alert-success' role='alert'>"."Se ha creado la tabla tareas correctamente"."</div>";
                        }else{
                            if($creaTabla[2] == true){
                                echo "<div class='alert alert-danger' role='alert'>"."Se ha producido un error al intentar crear la tabla"."</div>";
                            }else{
                                echo "<div class='alert alert-warning' role='alert'>"."La tabla tareas estaba creada"."</div>";
                            }
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