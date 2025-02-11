<?php 
session_start();
require_once('../modelo/mysqli.php');
borraFichero($_GET['id_fichero']);
header('Location: tarea.php?id=' . $_SESSION['usuario']['tarea']);
?>