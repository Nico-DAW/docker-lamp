<?php
    echo "<h1>¡Bienvenido!</h1>";         
    /*
        $array = array(
            1    => "a",
            "1"  => "b",
            1.5  => "c",
        true => "d",
    );
    */
    //var_dump($array);

    $_N=1;
    echo $_N."<br/>";

    $a="true";

    echo is_bool($a);
    //No imprime nada porque... 
    //is_bool($a) returns false because $a is a string, not a boolean.
    //false is printed as an empty string when used with echo, not "0".

    $b=0;
    echo is_bool($b);

    if($b){
        echo "Bananas!";
    }

    //Aquí tampoco imprime nada. Si se cambia a 1 el valor de $b imprime Bananas!

    $c="false"; 
    echo gettype($c)."<br>";

    //devuelve string
    $d="";
    echo empty($d)."<br>";
    //deuelve 1 porque es true

    //PHP considera los siguientes valores como "vacíos":

    /*
    ""	Cadena vacía
    0	Entero cero
    "0"	Cadena con un cero
    0.0	Número flotante cero
    NULL	Nulo
    false	Booleano falso
    array()	Array vacío
    */

    $e = 0.0; // el valor devuelto por empty($e);
    // $f = 0; // el valor devuelto por empty($f);
    // $g = false; // el valor devuelto por empty($g);
    // $h; // el valor devuelto por empty($h);
    // $i = “0”; // el valor devuelto por empty($i);
    // $j = “0.0”; // el valor devuelto por empty($j);
    // false, null, 0 y cadena vacia son considerados empty --> true - imprimirá 1 
    //recordar que //false is printed as an empty string when used with echo, not "0".

    echo empty($e);
?>            