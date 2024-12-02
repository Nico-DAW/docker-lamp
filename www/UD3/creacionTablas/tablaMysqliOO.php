<?php 
//Supongamos que ya tenemos creada la BBDD myDBoo
$servername = 'db';
$username = 'root';
$userpass = 'test';
$dbname = 'myDBoo';

try{
$conexion = new mysqli($servername,$username,$userpass,$dbname);
$error = $conexion->connect_errno;
if($error!=null){
    die("Se ha producido un error al crear la conexion ".$conexion->connect_error." Error con el número ".$error);
}
echo "Se ha establecido la conexión con la BBDD<br>";

//Asignamod la query a una variable (Punto y coma después de las comillas no antes)
$sql = 'CREATE TABLE Clientes(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
email VARCHAR(50)
)';
//Probamos... este tipo de pruebas dentro de un try/catch como en java (estamos dentro de uno)
if($conexion->query($sql)){
    echo "Se ha creado la tabla correctamente<br>";
}
}catch(mysqli_sql_exception $e){
    "Se ha producido un error al intentar crear la tabla en la BBDD ".$e->getMessage();
}finally{
    $conexion->close();
    echo "Se ha cerrado la conexion.";
}
?>