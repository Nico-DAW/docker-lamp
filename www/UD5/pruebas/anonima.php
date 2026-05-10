<?php 
// En las clases anónimas es necesario trabajar directamente con los datos
$triangulo = new class(2,4){
    private $base;
    private $altura;

    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }

    public function area(){
        return ($this->base * $this->altura) / 2; 
    }

};

echo $triangulo->area();

?>