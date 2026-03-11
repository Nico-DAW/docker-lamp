<?php 
class Juego{

    private $id;
    private $titulo; 
    private $descripcion; 
    private $horas; 
    private $id_jugador;
    
    public function __construct($id=null, $titulo, $descripcion, $horas, $id_jugador){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->horas = $horas;
        $this->id_jugador = $id_jugador;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getHoras(){
        return $this->horas;
    }

    public function getIdJuagador(){
        return $this->id_jugador;
    }

}
?>