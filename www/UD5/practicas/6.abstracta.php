<?php
abstract class Persona{
private string $id;
protected string $nombre;
protected string $apellidos; 

public setId(string $id){
    $this->id = $id;
}

public getId():string{
    return $this->id;
}

}
?>