<?php 
require_once("calculadora.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Ejemplo uso de clase calculadora</h2>
    <p>El valor al incrementar la propiedad estática es: </p>
    <?php

        $calculadora1=new Calculadora();
        $calc1 = $calculadora1::incrementa();
        echo $calc1."<br>";
        echo $calculadora1::$numero."<br>";


        /* Esto es así porque ++ al final es postincremento. Cuando return 
        $valor++ devuelve el $valor antes del incremento. De todas formas al
        crear propiedades y métodos estáticos, no es necesario crear una 
        instancia de la clase */
        echo "<p>Valores sin instanciar una clase</p>"; 
        $calculadora2 = Calculadora::$numero;
        echo $calculadora2. "<br>";
        $calculadora2 = Calculadora::incrementa();
        echo $calculadora2;

    ?>
    
</body>
</html>