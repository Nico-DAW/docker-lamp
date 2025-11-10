<?php 
function validaCampo($campo){
    $campo = htmlspecialchars($campo);
    $campo = trim($campo);
    $campo = stripslashes($campo);

    return $campo; 
}

function checkEdad($edad){
    $mensaje = '';
    $arrResult = [];
    if($edad<18){
        $mensaje = "No se pueden registrar usuarios menores de 18 años"; 
        $arrResult = [false, $mensaje];

    }elseif($edad>18){
        $mensaje = "Usuario mayor de 18 años"; 
        $arrResult = [true, $mensaje];
    }

    return $arrResult;
}

function checkCp($cp){
    $mensaje = '';
    $arrResult = [];

    $cpString = strval($cp);

    if(strlen($cpString)!=5){
        $mensaje = "La longitud del código postal no es de 5 digitos"; 
        $arrResult = [false, $mensaje];
    }else{
        $arrResult = [true, $mensaje];
    }; 

    return $arrResult; 
}

function checkPhone($phone){
    $mensaje = '';
    $arrResult = [];

    $phoneString = strval($phone);

    if(strlen($phoneString) != 9){
        $mensaje = "El número de móvil no es de 9 digitos"; 
        $arrResult = [false, $mensaje];
    }else{
        $arrResult = [true, $mensaje];
    }
    return $arrResult; 
}

?>