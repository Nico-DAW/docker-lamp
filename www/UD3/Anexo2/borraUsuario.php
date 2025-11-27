<?php
require_once('modelo/pdo.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){
 $id = $_GET['id'];
 $resultado = borraUser($id);
 header("Location:http://localhost/UD3/Anexo2/usuarios.php?borra=".$resultado[0]);
 exit();
}