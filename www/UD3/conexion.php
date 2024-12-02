<?php
//1. Conexion mysqli (OO)
/*
$conexion = new mysqli('db', 'colegio', 'colegio','colegio');
$error = $conexion->connect_errno;
if($error!=null){
    die("No se ha podido realizar la conexion".$conexion->connect_error." con número ".$error);
}
echo "Conexion correcta"
*/

//2. Conexion mysqli (procedimental)
/*
$conexion=mysqli_connect('db', 'colegio', 'colegio', 'colegio');
if(!$conexion){
    die("Error en la conexion".connect_error());
}
echo "La conexion se ha realizado de forma correcta";
*/
//3. Conexion PDO
$servername ='db';
$databasename = 'colegio';
$username = 'colegio';
$password = 'colegio';

try{
    $conPDO = new PDO("mysql:host=$servername; dbname=$databasename",$username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion realizada con exito";
}catch(PDOException $e){
echo "Error en la concexion".$e.getMessage(); 
}

?>