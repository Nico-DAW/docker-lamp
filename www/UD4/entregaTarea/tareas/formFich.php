<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($nombre) ? ($nombre) : '' ?>" required>
</div>
<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="<?php echo isset($descripcion) ? ($descripcion) : '' ?>" required></textarea>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">Seleccionar archivo</label>
  <input class="form-control" type="file" id="formFile" name="formFile" required>
</div>