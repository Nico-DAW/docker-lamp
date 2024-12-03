<?php
function valida($campo){
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialcharacters($campo);
    return $campo;
}

function validaTexto($campo){
    return(!empty(valida($campo) && is_string($campo)));
}

function validaNumero($campo){
    return(!empty(valida($campo) && is_numeric($campo)));
}
?>