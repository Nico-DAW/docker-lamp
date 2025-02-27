<?php 
class Fichero{

    // Podríamos definir $id como nullable ?int $id (lo que significa que puede ser un int o null.

    private ?int $id;
    private string $nombre;
    private array $file;
    private string $descripcion;
    private int $tarea;

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

    //En el constructor no lo pasamos como parámetro y lo incializamos en null. De esta manera la BBDD lo generará automáticamente.
    public function __construct(string $nombre, array $file, string $descripcion, int $tarea){
        $this->id = null;
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
        // Al no pasar el $id como parametro no es necesario validarlo
        /*
        if (empty($fichero->getId()) || !filter_var($fichero->getId(), FILTER_VALIDATE_INT) || $fichero->getId() < 0) {
            $errores['id'] = 'El id es obligatorio y debe ser un número entero positivo.';
        }
        */
        if (empty($fichero->getNom()) || !is_string($fichero->getNom()) || strlen($fichero->getNom()) < 3) {
            $errores['nombre'] = 'El nombre es obligatorio, debe ser una cadena de texto y tener al menos 3 caracteres.';
        }

        $file = $fichero->getFile();
        //$file es un array de tipo $_FILE[]
        if (!is_array($file) || empty($file['name'] )) {
            $errores['file'] = 'El archivo es obligatorio y debe ser un array del tipo $_FILE[].';
        }elseif ($file['size'] > self::MAX_SIZE) {
            $errores['file'] = 'El archivo no debe superar los 20MB.';
        }elseif (!in_array($file['type'], self::FORMATOS)) {
            $errores['file'] = 'El formato de archivo no es válido.';
        }elseif ($fichero->getFile()['error'] !== UPLOAD_ERR_OK) {
            $errores['file'] = "Error al subir el archivo.";
        }

        if (empty($fichero->getDesc()) || !is_string($fichero->getDesc()) || strlen($fichero->getDesc()) < 3) {
            $errores['descripcion'] = 'La descripción es obligatoria y debe ser una cadena de texto y tener al menos 3 caracteres.';
        }
        // En este caso mejor isset() Ya que si tarea = 0, empty($fichero->getTarea()) lo considera vacío.
        if ($fichero->getTa()!==null || !filter_var($fichero->getTa(), FILTER_VALIDATE_INT) || $fichero->getTa() < 0) {
            $errores['tarea'] = 'La clave foránea que relaciona con la tarea es obligatoria y debe ser un número entero positivo.';
        }

        return $errores;
    }
}
?>