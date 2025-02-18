<?php

class Contacto
{
    private string $nombre;
    private string $apellido;
    private string $telefono;

    public function __construct(string $nombre, string $apellido, string $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
    }

    public setNombre($nombre){
        $this->nombre=$nombre;
    }

    public getNombre(){
        return $this->nombre;
    }
}

?>