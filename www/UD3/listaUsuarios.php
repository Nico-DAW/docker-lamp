<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - UD3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar .nav-link {
            color: #198754;
        }
        .sidebar .nav-link:hover {
            color: darkgreen; /* optional hover effect */
        }
        .bg-dark {
            background-color: #c4c8cc !important;
        }
    </style>
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
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Edad</th>
                                    <th>Provincia</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include_once('lib/db.php');
                                        $usuarios=lista_usuarios();
                                    
                                      if(empty($usuarios)){
                                        echo '<div class="alert alert-info" role="alert">'."No hay resultados que mostrar".'</div>';
                                      }

                                      /*
                                      foreach($usuarios as $key=>$value){
                                        echo "<tr><td>".$value[0]."</td><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td></tr>";
                                      }
                                        debug------------->
                                        print_r($usuarios);
                                      */
                                      foreach($usuarios as $key=>$value){
                                        /* 
                                        Aqui es necesario sumar 1 porque AUTO_INCREMENT en Mysql empieza en 1 y los arrays en 0 ..... MAL NO VALE
                                        ... hay que hacerlo de otra manera... En el momento en el que se borra un regitro el ID en la BBDD cambia y
                                        deja de corresponderse con orden de un array que siempre empieza en 0. Por tanto... recuperaremos directamente
                                        ID en la consulta....
                                        */

                                        echo "<tr><td>".$value['nombre']."</td><td>".$value['apellidos']."</td><td>".$value['edad']."</td><td>".$value['provincia']."</td><td><a class='btn btn-success' href='registroUsuarios.php?id=".$value['id']."'>Editar</a>"."</td><td><a class='btn btn-outline-success' href='borrar.php?id=".$value['id']."'>Borrar</a>"."</td></tr>";
                                      }  
                                      
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <?php 
                        if(isset($_GET['mensaje'])){
                            echo '<div class="alert alert-info" role="alert">'.$_GET['mensaje'].'</div>';
                         }
                        ?>
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