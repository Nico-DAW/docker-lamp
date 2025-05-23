<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo isset($titulo) ? ($titulo) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo isset($descripcion) ? ($descripcion) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" id="estado" name="estado" required>
        <option value="" <?php echo isset($estado) ? '' : 'selected' ?> disabled>Seleccione el estado</option>
        <option value="en_proceso" <?php echo isset($estado) && $estado == 'en_proceso' ? 'selected' : '' ?> >En Proceso</option>
        <option value="pendiente" <?php echo isset($estado) && $estado == 'pendiente' ? 'selected' : '' ?> >Pendiente</option>
        <option value="completada" <?php echo isset($estado) && $estado == 'completada' ? 'selected' : '' ?> >Completada</option>
    </select>
</div>
<?php
if (checkAdmin())
{
?>
    <div class="mb-3">
        <label for="id_usuario" class="form-label">Usuario</label>
        <select class="form-select" id="id_usuario" name="id_usuario" required>
            <option value="" <?php echo isset($id_usuario) ? '' : 'selected' ?> disabled>Seleccione el usuario</option>
            <?php
                require_once('../modelo/pdo.php');
                $usuarios = listaUsuarios()[1];
                foreach ($usuarios as $usuario) { ?>
                    <option value="<?php echo ($usuario->getId()); ?>" <?php echo isset($id_usuario) && $id_usuario == ($usuario->getId()) ? 'selected' : '' ?> >
                        <?php echo $usuario->getUsername(); ?>
                    </option>
            <?php } ?>
        </select>
    </div>
<?php
}
else
{
    $idSes = $_SESSION['usuario']['id'];
    echo '<input type="hidden" name="id_usuario" id="id_usuario" value="' . $idSes . '">';
}
?>