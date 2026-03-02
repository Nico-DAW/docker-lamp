<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3 (Anexo 2)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('vista/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
             <div class="container d-flex justify-content-center align-items-center">
                  <div class="card p-4 shadow" style="width: 100%; max-width: 400px; margin:50px;">
                    <div class="card-body">
                      <h3 class="text-center mb-4">Iniciar Sesión</h3>
                      <form action="loginAuth.php" method="POST">
                        <div class="mb-3">
                          <label class="form-label">Usuario</label>
                          <input type="text" class="form-control" name="username" id="username" placeholder="Nombre del usuario">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Contraseña</label>
                          <input type="password" name="pass" id="pass" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                      </form>
                    </div>
                  </div>
             </div>
        </div>
    </div>

    <?php include_once('vista/footer.php'); ?>
    
</body>
</html>