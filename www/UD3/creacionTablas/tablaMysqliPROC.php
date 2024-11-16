<?php
//Pues eso... supongamos que tenemos la BBDD ya creada 
$servername = 'db';
$username = 'root';
$userpass = 'test';
$dbname = 'myDBproc';

$conexion = mysqli_connect($servername,$username,$userpass,$dbname);
if(!$conexion){
    echo "Se ha producido un error al intentar crear la conexion";
}
//Almacenamosla consulta en un variable --> 
$sql = 'CREATE TABLE Clientes(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
email VARCHAR(50)
)';

if(mysqli_query($conexion,$sql)){
    echo "Se ha creado la tabla con éxito<br>";
};

mysqli_close($conexion);
echo "Se ha cerrado la conexion";

?>