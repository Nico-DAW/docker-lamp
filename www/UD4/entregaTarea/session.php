<?php
session_start();
    if (!isset($_SESSION['usuario'])) {	
        header("Location: /UD4/entregaTarea/login.php?redirect=true");
        exit();
    }
?>



