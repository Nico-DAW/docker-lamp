<?php 
interface CalculosCentrosEstudios {
    public function numeroDeAprobados();
    public function numeroDeSuspensos();
    public function notaMedia();
}

abstract class Notas{

// Y aquí cambiamos el modificador de acceso de público a privado. Al cambiarlo necesitaremos getters y setters.

private $notas = []; 

public function setNotas($notas){
    $this->notas = $notas;
}

public function getNotas(){
    return $this->notas; 
}

// Aquí te faltaba el constructor

public function __construct($notas){
    $this->notas = $notas;
}

abstract public function toString();

}

class NotasDaw extends Notas implements CalculosCentrosEstudios{

    public $numPass;
    public $numFail;
    public $notaMedia; 

    public function numeroDeAprobados()
    {
        foreach ($this->getNotas() as $nota){
            if($nota>=5){
                $this->numPass++; 
            }
        }
        return $this->numPass; 
    }

    public function numeroDeSuspensos()
    {
       echo "Manzanas";
    }

    public function notaMedia(){
       $suma = 0; 
       foreach($this->getNotas()  as $nota){
        $suma += $nota; 
       }

       return $suma/count($this->getNotas());
    }

    public function toString(){
        $listaNotas = "";

        foreach ($this->getNotas() as $nota){
            $listaNotas .= "{$nota}, ";
        }

        return $listaNotas;
        /* 
        La solución al ejercicio se plantea así... pero es más elegante emplear implode()...
        lo que hace es convertir un array en string empleando un separador: 
        return implode(", ", $this->getNotas());
        */
    }
}

$ejemploNotas = new NotasDaw([5,6,7,5,8,6]);

echo $ejemploNotas->numeroDeAprobados()."<br>";
echo $ejemploNotas->notaMedia()."<br>";

echo $ejemploNotas->toString();

?>