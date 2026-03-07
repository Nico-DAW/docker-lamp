<?php

//Clase base
class Fruit {
  public $name;
  public $color;

  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

//Clase derivada 
class Strawberry extends Fruit {
  public $weight;
  //Redefinimos el método contruct e intro 
  public function __construct($name, $color, $weight) {
    /*
    En vez de repetir este código : 
    $this->name = $name;
    $this->color = $color;
    */
    parent::__construct($name, $color);
    $this->weight = $weight;
  }
  public function intro() {
    echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
  }
}

$strawberry = new Strawberry("Strawberry", "red", 50); //Método de la clase derivada
$strawberry->intro();//Método de la clase derivada

?>