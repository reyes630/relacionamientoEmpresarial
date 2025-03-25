<div class="data-container">
    <form action="/tipoServicio/update" method="post">
        <input type="hidden" name="idTipoServicio" value="<?php echo $tipoServicio->idTipoServicio ?>">
        <div class="form-group">
            <label for="TipoServicio">Nombre del Tipo de Servicio</label>
            <input type="text" name="TipoServicio" value="<?php echo $tipoServicio->TipoServicio ?>" required maxlength="45" class="form-control">
        </div>
        <div class="form-group">
            <label for="FKidServicio">Servicio</label>
            <select name="FKidServicio" required class="form-control">
                <?php foreach($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio ?>" <?php echo ($servicio->idServicio == $tipoServicio->FKidServicio) ? 'selected' : '' ?>>
                        <?php echo $servicio->Servicio ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/tipoServicio/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>