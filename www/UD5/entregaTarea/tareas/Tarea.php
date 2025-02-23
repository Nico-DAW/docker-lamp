<?php 
class Tarea{

    private $id;
    private $titulo;
    private $descripcion;
    private $estado;
    private $usuario;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTit($titulo){
        $this->titulo = $titulo;
    }

    public function getTit(){
        return $this->titulo;
    }

    public function setDesc($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDesc(){
        return $this->descripcion;
    }

    public function setEst($estado){
        $this->estado = $estado;
    }

    public function getEst(){
        return $this->estado;
    }

    public function setUsu($usuario){
        $this->usuario = $usuario;
    }

    public function getUsu(){
        return $this->usuario;
    }

    public function __construct($id, $titulo, $descripcion, $estado, $usuario){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuario = $usuario;
    }

}
?>