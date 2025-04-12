<?php

require_once 'flight/Flight.php';

$host=$_ENV['DATABASE_HOST'];
$dbname=$_ENV['DATABASE_NAME'];
$user=$_ENV['DATABASE_USER'];
$pass=$_ENV['DATABASE_PASSWORD'];

Flight::register('db', 'PDO', array("mysql:host=$host;dbname=$dbname",$user,$pass));

Flight::route('POST /register', function(){
    //El id y created se generan automáticamente por lo que podemos eliminarlos en el INSERT
    $nombre=Flight::request()->data->nombre;
    $email=Flight::request()->data->email;
    $password=password_hash((Flight::request()->data->password), PASSWORD_DEFAULT);

    //El token se genera en el proceso de login, no en el momento de registro del usuario... Aqui no -->
    //$token = bin2hex(random_bytes(32));
    //$created=Flight::request()->data->created_at;

    $sql="INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";

    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    //$stmt->bindParam(':token', $token);

    $stmt->execute(); 

    Flight::jsonp(['Usuario registrado correctamente.']);
});

// Esto con GET no funciona...  ver notas index_v1.php

Flight::route('POST /login', function(){
    $data = json_decode(Flight::request()->getBody(), true);
    //$username = $data['nombre'];
    $email = $data['email'];
    $password = $data['password'];

    $sql = "SELECT password FROM usuarios WHERE email=:email";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password, $resultado['password'])){
        $token = bin2hex(random_bytes(32));
        $sql="UPDATE usuarios SET token=:token WHERE email=:email";
        $stmt=Flight::db()->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
       
        Flight::jsonp(["Token actualizado para el usuario"]);

    }else{
        Flight::jsonp(["El password es erróneo"]);
    }


});


Flight::route('GET /contactos(/@id)',function($id = null){
    $token=Flight::request()->getHeader('X-Token');
    $sql="SELECT * from usuarios WHERE token=:token";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    /* Aquí si se emplease fetchAll se devolveria un array de arrays un array de usuarios... 
    Y el token es único (para un sólo usuario). Por eso fetch()
    */
    $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$usuario) {
        Flight::halt(401, 'Token inválido o usuario no encontrado.');
    }

    Flight::set('user', $usuario);
    /*
    Comprobación de que se ha creado $user -->
    $userCheck = Flight::get('user');
    Flight::jsonp([$userCheck['nombre']]);
    */
    if($id){
        $sqlContactos="SELECT c.* from contactos c JOIN usuarios u ON u.id=c.usuario_id WHERE u.token=:token AND c.id=:id";
        $stmt=Flight::db()->prepare($sqlContactos);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $contactosId = $stmt->fetch(PDO::FETCH_ASSOC);
        
    }else{
        $sqlContactos="SELECT c.* from contactos c JOIN usuarios u ON u.id=c.usuario_id WHERE u.token=:token";
        $stmt=Flight::db()->prepare($sqlContactos);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $contactosId = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    if (!$contactosId) {
        Flight::halt(404, 'El id del contacto facilitado o no existe o no es accesible para el usuario con el Token facilitado');
    }else{
            Flight::jsonp([$contactosId]);
    }

});

Flight::route('POST /contactos',function(){
    $token=Flight::request()->getHeader('X-Token');
    $sql="SELECT * from usuarios WHERE token=:token";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$usuario) {
        Flight::halt(401, 'Token inválido o usuario no encontrado.');
    }

    Flight::set('user', $usuario);

    $nombre = Flight::request()->data->nombre;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $userCheck = Flight::get('user');
    //Flight::jsonp([$userCheck['nombre']]);

    $idUser = $userCheck['id'];

    $sql="INSERT INTO contactos (nombre, telefono, email, usuario_id) VALUES (:nombre, :telefono, :email, :idUser)";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':idUser', $idUser);

    $stmt->execute();

    Flight::jsonp(["Contacto agregado correctamente."]);

});

Flight::route('PUT /contactos(/@id)',function($id = null){
    $token=Flight::request()->getHeader('X-Token');
    $sql="SELECT * from usuarios WHERE token=:token";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$usuario) {
        Flight::halt(401, 'Token inválido o usuario no encontrado.');
    }

    Flight::set('user', $usuario);
    /* 
    El id del contacto a actualizar también se podría recuperar del body
    $idContacto = Flight::request()->data->idContacto; 
    pero al final se recupera de la ruta.
    */
    $nombre = Flight::request()->data->nombre;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;
    $fecha = Flight::request()->data->fecha;

    
    $userCheck = Flight::get('user');
    /*
    Flight::jsonp([$userCheck['nombre']]);
    */
    $idUser=$userCheck['id'];

    if(!$id){
        Flight::halt(404, 'El id de contacto no existe o no está detallado en la ruta');
    }else{
        //Comprobamos que id del contacto pertenece al usuario

        $sqlChkId="SELECT * FROM contactos WHERE usuario_id=:idUser AND id=:id";
        $stmtId=Flight::db()->prepare($sqlChkId);
        $stmtId->bindParam(':idUser', $idUser);
        $stmtId->bindParam(':id', $id);
        $stmtId->execute();
        $resultMatch=$stmtId->fetch(PDO::FETCH_ASSOC);
        
        if($resultMatch){
            $sql="UPDATE contactos SET nombre=:nombre, telefono=:telefono, email=:email, created_at=:fecha WHERE usuario_id=:idUser AND id=:id";
            $stmt=Flight::db()->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':idUser', $idUser); 
            $stmt->bindParam(':id', $id); 
            $stmt->execute(); 
            Flight::jsonp(["Contacto actualizado correctamente."]);
        }else{
            Flight::halt(403, 'El usuario intenta acceder/modificar contactos que no le pertenecen');
        }
    }

   

});

Flight::route('/', function () {
    echo 'TAREA UD6 - API AGENDA';
});

Flight::start();
