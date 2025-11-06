<?php 
    include_once('lib/db.php');
    $id = $_GET['id'];
    $borrado = false; 
    $conexion=conecta();
    $mensaje = '';
    if(!empty($id)){
        if(borrar($conexion, $id)){
            $borrado = true;
            $mensaje = "Se ha eliminado al usuario satisfactoriamente";
        }
    };
    $conexion->close(); 
    header('Location: http://localhost/UD3/listaUsuarios.php?mensaje='.urlencode($mensaje));
    exit();
?>