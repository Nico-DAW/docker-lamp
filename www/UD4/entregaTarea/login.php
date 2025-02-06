<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD4. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include_once('vista/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
        <div class="form-container">
            <h4>Iniciar sesión</h4>

            <?php
            //Comprobar si se reciben datos
            $redirect = isset($_GET['redirect']) ? true : false;
            $error = isset($_GET['error']) ? true : false;
            $message = isset($_GET['message']) ? $_GET['message'] : null;
            if ($redirect)
            {
                echo '<p class="error">Debes iniciar sesión para acceder.</p>';
            }
            elseif ($error)
            {
                if ($message)
                {
                    echo '<p class="error">Error: ' . $message . '</p>';
                }
                else
                {
                    echo '<p class="error">Usuario y contraseña incorrectos.</p>';
                }
            }
            ?>

            <form action="./modelo/loginAuth.php" method="POST">
                <input name="usuario" id="usuario" type="text" placeholder="Usuario" required>
                <input name="pass" id="pass" type="password" placeholder="Contraseña" required>
                
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>

        </div>
    </div>

    <?php include_once('vista/footer.php'); ?>
    
</body>
</html>
