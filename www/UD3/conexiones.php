<?php
// 1. conexion mysqli (oo)
/*
$conexion = new mysqli('db','colegio','colegio','colegio');
// Aqui recordar que es la propiedad es connect_errno y no mysqli_errno
$error = $conexion->connect_errno;
if($error!=null){
    die("Se ha producido un error en la conexion ". $conexion->connect_error. " Con número ".$error);
}
echo "Conexion realizada con éxito<br>";
$conexion->close();
echo "Se ha cerrado la conexion";
*/

// 2. conexion mysqli (procedimental)
/*
$conexion = mysqli_connect('db','colegio','colegio','colegio');
if(!$conexion){
    die("Se ha producido un error en la conexion".mysqli_connect_error());
}
echo "La conexion se ha realizado con éxito<br>";
mysqli_close($conexion);
echo "Se ha cerrado la conexion";
*/

// 3. Conexion PDO
$servername = 'db';
$bbddname = 'colegio';
$username = 'colegio';
$userpass = 'colegio';

try{
// En PDO se crea la  conexion
$conexion = new PDO("mysql:host=$servername;dbname=$bbddname",$username,$userpass);
// Se fuerzan las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexion se ha realizado con exito<br>";
    //Recordar que aquí para cerrar la conexion es con null
    $conexion = null; 
    echo "Se ha cerrado la conexion<br>";
}catch(PDOException $e){
    echo "Se ha producido un error en la conexion".$e.getMessage();
}
// El try/catch también se podría emplear en msqli(oo) para capturar la excepcion mysqli_sql_exception $e
?>