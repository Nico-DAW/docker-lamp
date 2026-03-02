<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($nombre) ? ($nombre) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo isset($apellidos) ? ($apellidos) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? ($username) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="rol" class="form-label">Rol</label>
    <!--
    Así podríamos hacerlo pero la mejor manera de hacerlo sería por medio de un select.
    <input type="text" class="form-control" id="rol" name="rol" value="<?php //echo isset($rol) ? ($rol) : '' ?>" required>
    -->
    <select class="form-select" id="rol" name="rol" required>
        <option value="" <?=  isset($rol) ? '' : 'selected' ?>disabled>Seleccione el tipo de usuario</option>
        <option value="0" <?= isset($rol) && $rol == '0' ? 'selected' : '' ?>>Usuario registrado</option>
        <option value="1" <?= isset($rol) && $rol == '1' ? 'selected' : '' ?>>Administrador</option>
    </select>
</div>