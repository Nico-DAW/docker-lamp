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
                                </tr>
                            </thead>
                            <tbody>
                                <?php include_once('lib/db.php');
                                        $usuarios=lista_usuarios();
                                    
                                      if(empty($usuarios)){
                                        echo '<div class="alert alert-info" role="alert">'."No hay resultados que mostrar".'</div>';
                                      }

                                      /*foreach($usuarios as $key=>$value){
                                        echo "<tr><td>".$value[0]."</td><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td></tr>";
                                      }
                                        debug------------->
                                        print_r($usuarios);
                                      */
                                      foreach($usuarios as $key=>$value){
                                        echo "<tr><td>".$value['nombre']."</td><td>".$value['apellidos']."</td><td>".$value['edad']."</td><td>".$value['provincia']."</td></tr>";
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