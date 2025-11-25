<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Lista Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once("header.php");?>
    <!--header-->
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php include_once("menu.php");?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Lista Usuarios</h2>
                </div>
                <div class="container">
                    <p></p>
                    <div class="table">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>                            
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Contraseña</th>
                                    <th>Borrar</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include_once('utils.php');
                                    require_once('modelo/pdo.php');

                                    $usuarios = listaUsuarios();
                                    //var_dump($usuarios);
                                    if($usuarios[0]==true&&!empty($usuarios[1])){
                                    // En el if tenemos que contemplar &&!empty($usuarios[1]) ya que al inicio de la aplicación no exiten usuarios registrados. 
                                    foreach($usuarios[1] as $key=>$value){
                                      echo "<tr><td>".$value['id']."</td><td>".$value['username']."</td><td>".$value['nombre']."</td><td>".$value['apellidos']."</td><td>".$value['contrasena']."</td><td><a class='btn btn-outline-danger' href='#'>Borrar</a></td><td><a class='btn btn-outline-success' href='#'>Editar</a></td></tr>";
                                    }}else{
                                        echo "<tr><td>No se han encontrado resultados</td><td></td><td></td><td></td><td></td></tr>";
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    </br>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include_once("footer.php");?>
</body>
</html>