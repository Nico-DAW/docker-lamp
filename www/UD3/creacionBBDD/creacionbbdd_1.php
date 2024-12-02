<?php 
// 1. mysqli (oo)

// Creamos la conexion 
try{
// Para crear una BBDD no especificamos la BBDD (obviamente)
$conexion = new mysqli('db','root','test');
// Podemos si queremos crear un número de error: 
$error = $conexion->connect_errno;
    if($error!=null){
        // En esta linea vemos como es $conexion->error y no... $conexion->connect_error...
        die("Se ha producido un error en la conexion ".$conexion->error." con número: ".$error);
    }
echo "Se ha realizado la conexion con éxito.<br>";
// Una vez establecida la conexión, almacenamos la consulta en una variable: 
$sql = 'CREATE DATABASE myDBoo';
    if($conexion->query($sql)){
        echo "Se ha creado la BBDD con éxito.<br>";
    }
$conexion->close();
echo "La conexion se ha cerrado con éxito.";
}catch(mysqli_sql_exception $e){
        // A getMessage se accede con flecha y no con punto...
        echo "Se ha producido un error al intentar crear la BBDD<br>".$e->getMessage();
}
?>