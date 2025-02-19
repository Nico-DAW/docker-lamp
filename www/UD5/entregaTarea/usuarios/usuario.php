<?php 
class Usuario{
    private $id;
    private $username;
    private $nom;
    private $apel;
    private $pass;
    private $rol; 

    public function setId($id){
        $this->id = $id; 
    }

    public function getId(){
        return $this->id;
    }

    public function setUsername($username){
        $this->username = $username; 
    }

    public function getUsername(){
        return $this->username;
    }

    public function setNom($nom){
        $this->nom = $nom; 
    }

    public function getNom(){
        return $this->nom;
    }

    public function setApel($apel){
        $this->apel = $apel; 
    }

    public function getApel(){
        return $this->apel;
    }

    public function setPass($pass){
        $this->pass = $pass;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }

    public function getRol(){
        return $this->rol;
    }

    public function __construct($id, $nom, $apel, $username, $pass, $rol){
        $this->id = $id;
        $this->nom = $nom;
        $this->apel = $apel;
        $this->username = $username;
        $this->pass = $pass;
        $this->rol = $rol;
    }
}
?>