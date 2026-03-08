<?php 

abstract class Persona{
    private $id;
    protected $nombre;
    protected $apellidos;

    public abstract function __construct($id, $nombre, $apellidos);

    /*
    Las funciones relacionadas con id no son abstractas (getter/seter de id) 
    ya que nos piden la propiedad id sea private. 
    */

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id; 
    }

    public abstract function getNombre():string;
    public abstract function setNombre($nombre);
    public abstract function getApellidos():string;
    public abstract function setApellidos($apellidos);

    public abstract function accion(); 
}

class Usuarios extends Persona{

    public function __construct($id, $nombre, $apellidos){
        /* 
        Es interesante en este caso ver como se implementa el $id
        referenciando a parent::setId($id);
        */
        parent::setId($id);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    /* 
    si en la abstract detallamos que se devuelve un tipo de valor en la 
    implementación en la clase que extiende también debe indicarse.
    */
    public function getNombre():string{
        return $this->nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getApellidos():string{
       return $this->apellidos;
    }

    public function accion(){
        return "El nombre del usuario es: ".$this->getNombre()." y el apellido es: ".$this->getApellidos();
    }
}

$usuario1 = new Usuarios(1, "Manolito", "García");
echo $usuario1->accion();
?>