<div class="data-container">
    <form action="/servicio/update" method="post">
        <input type="hidden" name="idServicio" value="<?php echo $servicio->idServicio ?>">
        <div class="form-group">
            <label for="Servicio">Nombre del Servicio</label>
            <input type="text" name="Servicio" value="<?php echo $servicio->Servicio ?>" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/servicio/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>