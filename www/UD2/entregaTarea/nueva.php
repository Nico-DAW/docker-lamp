<?php
session_start(); // Iniciamos la sesión

if (!isset($_SESSION['almacen'])) {
    $_SESSION['almacen'] = []; // Inicializamos la variable de sesion si no existe
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $workTitle = $_POST['titulo'];
        $workContent = $_POST['contenido'];
        $workProgress = $_POST['progreso'];

        $error = false; 
        $message = "";

        if(empty($workTitle)){
            $message = "Es necesario definir un título para la nueva tarea";
            $error = true;
        }

        if(empty($workContent)){
            $message = "Es necesario definir un contenido para la nueva tarea";
            $error = true;
        }

        if($error == true){
            echo "<div class=\"border d-flex align-items-center justify-content-center\" style=\"height: 100vh;\"><div class=\"text-center\"><p>$message</p><a href=\"nuevaForm.php\" class=\"btn btn-primary\">Volver</a></div></div>";
        }

        if($error == false){
            include_once("utils.php");
            guardar($workTitle, $workContent, $workProgress);
        }

    }
?>
</body>
</html>