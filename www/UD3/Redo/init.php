<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
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
                    <h2>Inicialización</h2>
                </div>
                <div class="container">
                    <?php 
                    require_once('modelo/mysqli.php');
                    $resultado = creaDB();
                    echo $resultado[1];
                    ?>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include_once("footer.php");?>
</body>
</html>