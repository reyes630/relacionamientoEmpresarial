<div class="data-container">
    <form action="/tipoEvento/update" method="post">
        <input type="hidden" name="idTipoEvento" value="<?php echo $tipoEvento->idTipoEvento ?>">
        <div class="form-group">
            <label for="TipoEvento">Nombre del Tipo de Evento</label>
            <input type="text" name="TipoEvento" value="<?php echo $tipoEvento->TipoEvento ?>" required maxlength="50" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/tipoEvento/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>