<?php
/*
Condigo anterior a la creación de la clase Autoriza.php
session_start();
session_unset();
session_destroy();

header("Location:login.php?mensaje=".urlencode("Logout realizado con exito"));
*/
require_once("models/Autorizacion.php");

Autoriza::logout();
?>