<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
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
                    <h2>Nuevo usuario</h2>
                </div>
                <div class="container">
                    <form action="" method="POST">
                        <div class="mb-3">
                        <input type='hidden' name='id'/>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='username'>Username</label>
                        <input class="form-control" type='text' name='username'/>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='nombre'>Nombre</label>
                        <input class="form-control" type='text' name='nombre'/>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='apellidos'>Apellidos</label>
                        <input class="form-control" type='text' name='apellidos'/>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for='contrasena'>Contraseña</label>
                        <input class="form-control" type='text' name='contrasena'/>
                        </div>
                        <div class="mb-3">
                        <button class="btn btn-primary"type="submmit">Enviar</button>
                        </div>



                    </form>
     
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php include_once("footer.php");?>
</body>
</html>