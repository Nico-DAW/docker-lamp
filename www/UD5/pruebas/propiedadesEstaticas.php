<?php 
class Alien{
    private $nombre;
    /* 
    private $numberOfAliens=0;

    Aquí si se define el atributo como privado... cada objeto 
    tendrá su propia copia de la propiedad $numberOfAliens... cada objeto
    de Alien empezará en 0 e incrementará sólo su propio valor por lo que cada 
    objeto devolvera 1. 
    La solución es hacer que el contador (la propiedad) sea estática porque el
    el contador pertenece a la clase y no a cada instancia.
    */
    private static $numberOfAliens=0;
    public function __construct($nombre){
        $this->nombre=$nombre;
        //$this->numberOfAliens++;
        self::$numberOfAliens++;
    }

    public function getNumberOfAliens(){
        //return $this->numberOfAliens;
        return self::$numberOfAliens;
    }

    public function getNombre(){
        return $this->nombre;
    }
}

$alienAlargado = new Alien("Paco");
$alienGordo = new Alien("Manolo");

echo $alienAlargado->getNombre()."<br>";
echo $alienGordo->getNombre()."<br>";

echo $alienGordo->getNumberOfAliens();


?>