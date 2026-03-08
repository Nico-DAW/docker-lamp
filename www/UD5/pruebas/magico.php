<?php

class Coche{
    private $potencia;
    private $autonomia;

    public function __set($potencia,$valor){
        if(property_exists(__CLASS__,$potencia)){
            $this->$potencia = $valor;
        }else{
            echo "No existe la propiedad.";
        }
    }

    public function __get($potencia){
        if(property_exists(__CLASS__,$potencia)){
        return $this->$potencia;
        }
        return NULL;
    }
}

$autoUno= new Coche();

/*
$autoUno->__set("potencia",100);

//El método mágico __get reuiere 1 argumento. 
echo $autoUno->__get("potencia");
*/

/* 
Aquí parece que llama directamente a la propiedad pero en realidad llama a __set() __get()
ten en cuenta que esta clase los atributos son privados. No se les podría asignar valor como 
hacemos a continuación y sinembargo funciona.
*/
$autoUno->potencia=100;
echo $autoUno->potencia;
?>