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
        $this->tarea = $tarea;
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
    $this-> con static nanai... Para poder hacerlo  hay que pasarle un objeto Fichero => public static function validar(Fichero $fichero): array {...}
    y acceder a los valores con getters.
 
    public static function validar(): array
    {
        $errores = [];

        if (empty($this->id) || !filter_var($this->id, FILTER_VALIDATE_INT) || $this->id < 0) {
            $errores['id'] = 'El id es obligatorio y debe ser un número entero positivo.';
        }

        if (empty($this->nombre) || !is_string($this->nombre) || strlen($this->nombre) < 3) {
            $errores['nombre'] = 'El nombre es obligatorio, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->file) || !is_string($this->file) || strlen($this->file) < 3) {
            $errores['file'] = 'El archivo es obligatorio y deben ser una cadena de texto y tener al menos 3 caracteres.';
        }elseif ($this->file['size'] > self::MAX_SIZE) {
            $errores['file'] = 'El archivo no debe superar los 20MB.';
        }elseif (!in_array($this->file['type'], self::FORMATOS)) {
            $errores['file'] = 'El formato de archivo no es válido.';
        }

        if (empty($this->descripcion) || !is_string($this->descripcion) || strlen($this->descripcion) < 3) {
            $errores['descripcion'] = 'La descripción es obligatoria y deben ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($this->tarea) || !filter_var($this->tarea, FILTER_VALIDATE_INT) || $this->tarea < 0) {
            $errores['tarea'] = 'La clave foránea que relaciona con la tarea es obligatoria y debe ser un número entero positivo.';
        }

        return $errores;
    }
   */

  public static function validar(Fichero $fichero): array
    {
        $errores = [];
        
        if (empty($fichero->getId()) || !filter_var($fichero->getId(), FILTER_VALIDATE_INT) || $fichero->getId() < 0) {
            $errores['id'] = 'El id es obligatorio y debe ser un número entero positivo.';
        }

        if (empty($fichero->getNom()) || !is_string($fichero->getNom()) || strlen($fichero->getNom()) < 3) {
            $errores['nombre'] = 'El nombre es obligatorio, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        $file = $fichero->getFile();
        //$file es un array de tipo $_FILE[]
        if (empty($file['name']||!is_array($file))) {
            $errores['file'] = 'El archivo es obligatorio y debe ser un array del tipo $_FILE[].';
        }elseif ($file['size'] > self::MAX_SIZE) {
            $errores['file'] = 'El archivo no debe superar los 20MB.';
        }elseif (!in_array($file['type'], self::FORMATOS)) {
            $errores['file'] = 'El formato de archivo no es válido.';
        }

        if (empty($fichero->getDesc()) || !is_string($fichero->getDesc()) || strlen($fichero->getDesc()) < 3) {
            $errores['descripcion'] = 'La descripción es obligatoria y debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        if (empty($fichero->getTa()) || !filter_var($fichero->getTa(), FILTER_VALIDATE_INT) || $fichero->getTa() < 0) {
            $errores['tarea'] = 'La clave foránea que relaciona con la tarea es obligatoria y debe ser un número entero positivo.';
        }

        return $errores;
    }
}
?>