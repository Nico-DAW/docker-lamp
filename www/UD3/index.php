<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - UD3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar .nav-link {
            color: #198754;
        }
        .sidebar .nav-link:hover {
            color: darkgreen; /* optional hover effect */
        }
        .bg-dark {
            background-color: #c4c8cc !important;
        }
    </style>
</head>
<body>
 <div class="container-fluid">
    <div class="row">
    <?php 
    include_once("header.php");
    include_once("lib/db.php"); 
    include_once("menu.php"); 
        
        $conexion = conecta();
        $crea = crea_db($conexion, "tienda");
        selecciona_db($conexion, 'tienda');
        crea_tabla_usuarios($conexion);
        
    include_once("footer.php");
    ?>
    </div>
  </div>
</body>
</html>