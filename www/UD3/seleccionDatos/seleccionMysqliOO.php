<?php
$conexion = new mysqli('db','root','test','myDBoo');
$error = $conexion->connect_errno;

if($error!=null){
    die("Se ha producido un error al intentar conectarse a la BBDD<br>".$conexion->error." Error con número ".$error);
}

echo "Se ha realizado la conexion con éxito<br>";

// Almacenamos el SELECT en una variable... 
$sql="SELECT id, nombre, apellido FROM Clientes;";

// !!! Y almacenamos el resultado de la consulta en otra --> 
$resultado = $conexion->query($sql);

//Comprobamos si en resultado hay filas... con num_rows --> 

if($resultado->num_rows>0){
//fetch_assoc() coloca todos los resultados en una matriz asociativa que podemos recorrer
//Y para recorrelos creamos un bucle 
echo "Los resultados de la consulta son:<br>";

// !!! Fijarse aquí que las columnas van entre comillas...
while($row=$resultado->fetch_assoc()){
    echo $row["id"]."-".$row["nombre"]."-".$row["apellido"]."<br>";
}
}else{
    echo "Non hai resultados<br>";
}
//... Lo suyo sería hacer esto dentro de un try/catch
//Cerramos la conexion
$conexion->close();
echo "Se ha cerrado la conexion.";
?>