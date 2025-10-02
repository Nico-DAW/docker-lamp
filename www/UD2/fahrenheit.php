<?php
$fahrenheit=75;

function ctof($fahrenheit){
    $cel=(($fahrenheit-32)*5)/9;
    return $cel;
}

echo "Resultado de la conversion: ". ctof($fahrenheit)." grados Fahreinheit";
?>