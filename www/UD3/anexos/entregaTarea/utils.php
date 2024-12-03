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

//Codigo heredado tarea anterior, solución.

function filtraCampo($campo)
{
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

function esCampoValido($campo)
{
    return !empty(filtraCampo($campo));
}

function guardar($titulo, $desc, $est)
{
    if (esCampoValido($titulo) && esCampoValido($est) && esCampoValido($est))
    {
        global $tareas;
        $data =[
            'titulo' => filtraCampo($titulo),
            'descripcion' => filtraCampo($desc),
            'estado' => filtraCampo($est)
        ];
        array_push($tareas, $data);
        return true;
    }
    else
    {
        return false;
    } 
}
?>