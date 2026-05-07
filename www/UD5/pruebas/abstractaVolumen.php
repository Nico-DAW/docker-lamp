<?php 
abstract class Volumen{
    private $tipo;
    private $nombre;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function __construct($nombre,$tipo){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }
}

class Cubo extends Volumen{
    private $color;
}
?>