<div class="data-container">
    <form action="/rol/update" method="post">
        <input type="hidden" name="idRol" value="<?php echo $rol->idRol ?>">
        <div class="form-group">
            <label for="Rol">Nombre del Rol</label>
            <input type="text" name="Rol" value="<?php echo $rol->Rol ?>" required maxlength="45" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/rol/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>