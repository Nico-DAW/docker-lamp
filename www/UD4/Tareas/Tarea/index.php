<?php 
require_once("utils.php");
requiereLogin();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3 (Anexo 2)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .claro{
            background-color: #ffffff;
            color: #2b2b2b;
        }

        .oscuro{
            background-color: #2b2b2b;
            color: #ffffff;
        }
    </style>
</head>
<body class=<?= $tema ?>>

    <?php include_once('vista/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('vista/menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Inicio</h2>
                </div>

                <div class="container justify-content-between">
                    <p>Bienvenido <?= $_SESSION['username']; ?>! Tienes permisos de <?= $_SESSION['rol'] == 1 ? 'Administrador' : 'Usuario'; ?></p>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('vista/footer.php'); ?>
    
</body>
</html>