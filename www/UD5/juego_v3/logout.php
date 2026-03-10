<?php
session_start();
session_unset();
session_destroy();

header("Location:login.php?mensaje=".urlencode("Logout realizado con exito"));
?>