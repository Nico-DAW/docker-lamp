<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Nueva Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--header-->
    <?php
    include_once("header.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <!--menu-->
            <?php 
            include_once("menu.php");
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Nueva Tarea</h2>
                </div>
                <div class="container">
                    <!--<p>Aquí va el contenido </p>-->
                    <!--5. Crea un fichero PHP nuevaForm.php que contenga el formulario para crear una nueva tarea. La estructura será igual a la página de inicio y habrá que cambiar
                    el título del contenido y el contenido en si mismo con el propio formulario. Este formulario se enviará mediante POST a un fichero nueva.php que lo procesará
                    y mostrará un mensaje en la zona central confirmando o indicando qué campo da el error. Utiliza el método que simula guardar de utils.php-->
                    <form class="mb-5" method="POST" action="nueva.php">
                        <div class="mb-3">
                            <label class="form-label" for="titulo">Título de la nueva tarea: </label>
                            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Introduce el título de la nueva tarea."><br>
                            <label class="form-label" for="contenido">Contenido de la nueva tarea: </label>
                            <!--Tanto el input como el textarea los haría required... pero como pide validar con PHP pues nada-->
                            <textarea class="form-control" name="contenido" id="contenido" rows="3" placeholder="Introduce el contenido de la nueva tarea."></textarea><br>
                            <label class="form-label" for="progreso">Seleccione un estado de la tarea: </label>
                            <select  class="form-select" name="progreso" id="progreso" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="proceso">En proceso</option>
                                <option value="completada">Completada</option>
                            </select><br>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php 
        include_once("footer.php");
    ?>
</body>
</html>