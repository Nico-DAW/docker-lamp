<?php
function filtra($campo){
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

function valida($campo){
    return (!empty(filtra($campo)));
}
?>