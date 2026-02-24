<?php 
$cookiename = "usuario";
$cookievalue = "Sabela"; 

//setcookie($cookiename, $cookievalue, time()-360, "/");

/*
A continuación no podríamos emplear tampoco el siguiente código, 
ya que generaríamos un bucle infinito. 

header("Location:".$_SERVER['PHP_SELF']);
exit();

Habrá que emplear un condicional: 
*/

if (!isset($_COOKIE[$cookiename])) {
    setcookie($cookiename, $cookievalue, time()+3600, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_COOKIE[$cookiename])){
        echo "La cookie no está definida";
    }else{
        echo "La cookie ".$_COOKIE[$cookiename]." está definida";
    } 
    /*
    Las cookies no están disponibles justo en el momento de ser seteadas: setcookie(...)
    es necesario recargar la página para que estas estén disponibles. Es habitual 
    el empleo de header("Location:") --> exit() para recargar la paǵina.
    */

    /* 

    header("Location:".$_SERVER['PHP_SELF']);
    exit();
    
    En este punto no podríamos crear un header("Location:...") daría error
    Siempre que empleemos header(), setcookie(), session_start(). Deben ir antes de cualquier 
    echo o HTML.
    */
    ?>
    
</body>
</html>