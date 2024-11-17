<?php
$conexion = new mysqli('db','root','test','myDBoo');
// Recordar que es connect_errno... y no mysqli_errno...
$error = $conexion->connect_errno;

if($error!=null){
    die("Fallo al intentar realizar la conexion".$connect->error. " Error con número ".$error);
}

// Creamos la inserción múltiple
$sql ="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Pedro','Machado','pedro@daw.gal');";
$sql .="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Marco','Jimenez','marcos@daw.gal');";
$sql .="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Federico','Rodriguez','fede@daw.gal');";
// Aquí será necesario poner multi_query
if($conexion->multi_query($sql)){
    echo "Se ha realizado la inserción<br>"; 
    do {
        $ultimo_id = $conexion->insert_id;
        echo "Se ha creado un nuevo registro con el id: " . $ultimo_id . '<br>';
    } while ($conexion->next_result()); //Es necesario recorrerlos todos para liberar la conexión para los siguientes usos  
}
$conexion->close();
    echo "Se ha cerrado la conexión."; 
?>