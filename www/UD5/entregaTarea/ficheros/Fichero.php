<?php 
class Fichero{

    private $id;
    private $nombre;
    private $file;
    private $descripcion;
    private $tarea;

    //public const FORMATOS = ['png', 'jpg', 'pdf'];
    public const FORMATOS = ['image/jpeg', 'image/png', 'application/pdf'];
    public const MAX_SIZE = 20 * 1024 * 1024;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNom($nombre){
        $this->nombre = $nombre;
    }

    public function getNom(){
        return $this->nombre;
    }

    public function setFile($file){
        $this->file = $file;
    }

    public function getFile(){
        return $this->file;
    }

    public function setDesc($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDesc(){
        return $this->descripcion;
    }

    public function setTa($tarea){
        $this->descripcion = $tarea;
    }

    public function getTa(){
        return $this->tarea;
    }

    public function __construct($id, $nombre, $file, $descripcion, $tarea){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->file = $file;
        $this->descripcion = $descripcion;
        $this->tarea = $tarea;
    }

    /* 
    public function validar(): array
    {
        $errores = [];

        if (empty($this->nombre) || !is_string($this->nombre) || strlen($this->nombre) < 3) {
            $errores['nombre'] = 'El nombre es obligatorio, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->apellidos) || !is_string($this->apellidos) || strlen($this->apellidos) < 3) {
            $errores['apellidos'] = 'Los apellidos son obligatorios, deben ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->edad) || !filter_var($this->edad, FILTER_VALIDATE_INT) || $this->edad < 0) {
            $errores['edad'] = 'La edad es obligatoria y debe ser un número entero positivo.';
        }

        if (empty($this->provincia) || !is_string($this->provincia) || strlen($this->provincia) < 3) {
            $errores['provincia'] = 'La provincia es obligatoria, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        return $errores;
    }
    */

    public static function validar(): array
    {
        $errores = [];

        if (empty($this->nombre) || !is_string($this->nombre) || strlen($this->nombre) < 3) {
            $errores['nombre'] = 'El nombre es obligatorio, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->apellidos) || !is_string($this->apellidos) || strlen($this->apellidos) < 3) {
            $errores['apellidos'] = 'Los apellidos son obligatorios, deben ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->edad) || !filter_var($this->edad, FILTER_VALIDATE_INT) || $this->edad < 0) {
            $errores['edad'] = 'La edad es obligatoria y debe ser un número entero positivo.';
        }

        if (empty($this->provincia) || !is_string($this->provincia) || strlen($this->provincia) < 3) {
            $errores['provincia'] = 'La provincia es obligatoria, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        return $errores;
    }

}
?>