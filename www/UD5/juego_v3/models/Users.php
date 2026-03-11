<?php

class Usuario{
    private $username;
    private $pass;
    private $rol;

    //Aquí arreglamos la clase tenía: $this->$username

    public function __construct($username,$pass,$rol){
        $this->username = $username;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPass(){
        return $this->pass;
    }

    public function getRol(){
        return $this->rol;
    }
}

?>