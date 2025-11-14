<?php 
//echo $_POST['fecha'];
require_once('lib/init.php');
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$conexion = conecta(); 
selecciona_db($conexion,"donacion");
guardaFecha($conexion, $id, $fecha);