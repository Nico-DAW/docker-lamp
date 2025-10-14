<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        Introduce un número: <input type ="text" name="comprueba">
        Longitud frase: <input type ="text" name="frase">
        <input type="submit" value="Enviar">
        <br>
        <?php
        $caract;
        $caract = $_POST['comprueba'];
        //$result = is_integer($caract)?"Es numero":"No es número";
        //Lo anterior no funciona para verificar porque is_integer verifica si se trata de un entero pero por un input text entra texto (string) no números.
        //por lo tanto para realizar la comprobación empleamos la función  ctype_digit($caract).
        //c_type(...) sólo acepta strings como argumento válido y comprueba caracter a caracter.
        $result = ctype_digit($caract)?"es numero":"no es número";
        echo "El caracter introducido ". $result ."<br>";

        $frase = $_POST['frase'];
        echo "La longitud de la frase es de ".longitud($frase). " caracteres <br>"; 
           function longitud($frase){
                $result=strlen($frase);
                return $result; 
        }
        echo "La hora actual es ". date("H:i:s");
       ?>
    </form>
</body>
</html>