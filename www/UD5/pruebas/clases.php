<?php

/*
class Fruit{
    public $nombre; 
    public $color; 

    function getNombre(){
        return $this->nombre; 
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

}

$apple = new Fruit(); 

$apple->setNombre("Manzana");

echo $apple->getNombre();
*/

// Pruebas

class Fruit{
    public $nombre; 
    public $color; 
}

$apple = new Fruit();

echo ($apple instanceof Fruit);

$apple->nombre = "Manzana";

echo "<br> Nombre de apple <br>";

echo $apple->nombre; 

$banana = new Fruit();

echo "<br>Nombre de banana <br>";

$banana->nombre = "Plátano";

echo $banana->nombre; 

?>