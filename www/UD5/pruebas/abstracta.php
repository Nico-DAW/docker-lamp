<?php
abstract class Animalito {
    private $edad;

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getEdad() {
        return $this->edad;
    }
    /*
    Hasta aquí poca gaita. Ejemplo para demostra que puede tener 
    métodos publicos y propiedades privadas. Las clases abstractas se emplean 
    para realizar implementaciones paciales... Obligamos a las hijas a que
    implementen 1 o varias funciones -> definiendo funciones abstractas ->
    */
    abstract public function sonido($sound);
}

class Colebra extends Animalito{
    private $tipo;

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo; 
    }

    public function sonido($sound){
        echo $sound;
    }
}

$cobra = new Colebra();
$cobra->setEdad(100);

echo $cobra->getEdad()."<br>";

$cobra->setTipo("velenosa");

echo $cobra->getTipo()."<br>";
$cobra->sonido("sssssssssssssssssssnake!");

?>