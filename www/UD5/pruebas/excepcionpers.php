<?php

// Crear una excepción personalizada
class EdadInvalidaException extends Exception
{
    public function mensajePersonalizado()
    {
        return "Error: la edad proporcionada no es válida.";
    }
}

// Función que valida la edad
function validarEdad($edad)
{
    if ($edad < 18) {
        throw new EdadInvalidaException("Debes ser mayor de edad.");
    }

    return "Edad válida.";
}

try {
    echo validarEdad(15);
} catch (EdadInvalidaException $e) {
    echo $e->mensajePersonalizado() . "<br>";
    echo "Mensaje original: " . $e->getMessage();
} catch (Exception $e) {
    echo "Ocurrió un error general: " . $e->getMessage();
}

?>