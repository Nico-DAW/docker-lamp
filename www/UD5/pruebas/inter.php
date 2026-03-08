<?php 

interface CalculosCentrosEstudios{
    public function numeroDeAprobados():int;
    public function numeroDeSuspensos():int;
    public function notaMedia():float;
}

abstract class Notas{

    private $notas = [];

    public function set_notas($notas){
        $this->notas = $notas;
    }

    public function get_notas(){
        return $this->notas; 
    }
    
    abstract function toString():array;
}

class NotasDaw extends Notas implements CalculosCentrosEstudios{
    /* 
    Esto aquí está mal...
    private $notas = parent::get_notas();
    //Y esto también muestra error...
    private $notas = $this->get_notas();
    */
    /* 
    Ojo al dato amigo... En PHP El error aparece porque en PHP no puedes ejecutar 
    métodos cuando declaras propiedades de una clase. Las propiedades solo pueden
    tener valores constantes, no llamadas a funciones ni uso de $this o parent.
    POR ESO DA ERROR.
    */
    public function numeroDeAprobados():int{
        /* 
        Sinembargo dentro de los métodos si puedes definir variables a partir de
        llamadas a funciones... 
        */ 
        $notas = parent::get_notas();
        $cuenta = 0;
        foreach($notas as $nota){
            if($nota>=5){
                $cuenta++;
            }
        }
        return $cuenta;
    }

    public function numeroDeSuspensos():int{
        $cuenta = 0;
        // Otra manera de acceder a notas dentro de la funcion es con this
        foreach($this->get_notas() as $nota){
            if($nota<5){
                $cuenta++;
            }
        }
        return $cuenta;
    }

    public function notaMedia():float{
        return 1.5; 
    }

    public function toString():array{
        return [1,2,1.5];
    }

}

$notasCiclo = new NotasDaw();
$notasCiclo->set_notas([5,3,2,6,7,4,6,8,5,3]);

echo $notasCiclo->numeroDeAprobados()."<br>";
echo $notasCiclo->numeroDeSuspensos();
?>