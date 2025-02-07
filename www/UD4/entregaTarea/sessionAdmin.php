<?php
session_start();
    if (!isset($_SESSION['usuario'])) {	
            header("Location: /UD4/entregaTarea/login.php?redirect=true");
        exit();
    }

    if(($_SESSION['usuario']['rol'])!=1){
        header("Location: /UD4/entregaTarea/index.php?redirect=true");
        exit();    
    }
?>