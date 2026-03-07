<?php 

//Ejemplo apuntes constructor destructor y mágicos

class Fruta{
    private $nombre; 
    private $color;
    private $peso;

    public function __construct($nombre){
        $this->nombre = $nombre; 
    }

    public function getNombre(){
        return $this->nombre; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}


    $apple = new Fruta("Manzana");
    echo $apple->getNombre();
    var_dump($apple instanceof Fruta);

?>