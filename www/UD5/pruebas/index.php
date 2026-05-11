<?php 
require("abstractaVolumen.php");
require ("singleton.php");
$caja = new Cubo("Box","Cubo1","Rosa");
echo "El nombre del volumen es: ".$caja->getNombre()." y el color es: ". $caja->getColor();

Single::getConnection();
?>