<?php 
include_once('../modelo/pdo.php');
/*conecta();
echo "Conexion satisfactoria"*/
creaDB('pruebas');
echo creaTabla();
//var_dump(creaTabla());
//var_dump($_GET['vehiculo1']);

//$vehiculo1 = is_null($_GET['vehiculo1']) ? NULL : $_GET['vehiculo1'];   $GET['vehiculo1']??null  $GET['vehiculo1']??PDO::PARAM_NULL
//echo $_GET['fruit'];

echo nuevoUser($_GET['userNam'],$_GET['pass'],$_GET['fecha'],$_GET['color'],$_GET['fruit'],$_GET['vehiculo1']??NULL,$_GET['vehiculo2']??NULL,$_GET['vehiculo3']??NULL);

?>