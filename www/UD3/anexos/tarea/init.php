
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Menú</h2>
                </div>

                <div class="container justify-content-between">
                    <p>Aquí va el contenido </p>
                    <?php 
                    $conexion = new mysqli('db', 'root', 'test'); 
                    $error = $conexion->connect_errno;
                    if($error!=null){
                        die("Se ha producido un error en la conexion. Error con número. ".$error);
                    }

                    echo "La conexión a la BBDD se ha realizado con exito <br>";

                    try{
                        $sqldb = "CREATE DATABASE IF NOT EXISTS tareas";
                        if($conexion->query($sqldb)){
                            echo "Se ha creando la BBDD tareas correctamente. <br>";
                        $conexion->select_db("tareas");
                        $sqltu = "CREATE TABLE IF NOT EXISTS usuarios(
                            id INT(6) AUTO_INCREMENT PRIMARY KEY,
                            nombre VARCHAR(20) NOT NULL,
                            apellidos VARCHAR(40) NOT NULL,
                            username VARCHAR(30)NOT NULL
                            );";
                        if($conexion->query($sqltu)){
                            echo "<p class="--bs-success-bg-subtle">Se ha creando la tabla usuarios correctamente. </p><br>";
                            }else{
                                echo "Error creando la tabla usuarios.".$conexion->error.'<br>';
                            }
                        }else{
                            echo "Error creando la BBDD.".$conexion->error.'<br>';
                        }
                    }catch(mysqli_sql_exception $e){
                        echo "Se ha producido un error al intentar crear la BBDD: ".$e->getMessage().'<br>'; 
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>
