<?php
$conexion = new mysqli('db','root','test','myDBoo');
$error = $conexion->errno;

if($error!=null){
    die("Se ha producido un error al intentar establecer la conexion ".$conexion->error. " Error con número ".$error);
}
echo "Se ha establecido la conexion con la BBDD.<br>";

$sql="UPDATE Clientes SET apellido='Prats' WHERE nombre='Matias'";
$conexion->query($sql);

echo "Se han producido los cambios con éxito";
?>