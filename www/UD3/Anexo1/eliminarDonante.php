<?php
include("lib/init.php");
$id = $_GET['id'];
$mensaje = '';
(eliminaDonante($id)==1)?$mensaje="Se ha eliminado al donante":$mensaje="No se ha podidoeliminar el donante";
header('Location:listarDonantes.php?mensaje='.$mensaje);
exit();
