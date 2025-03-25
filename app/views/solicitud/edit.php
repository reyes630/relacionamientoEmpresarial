<div class="data-container">
    <form action="/solicitud/update" method="post">
        <div class="form-group">
            <label for="">ID de la solicitud</label>
            <input readonly value="<?php echo $solicitud->idSolicitud ?>" type="number" name="idSolicitud" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Descripción</label>
            <input type="text" value="<?php echo $solicitud->Descripcion ?>" name="Descripcion" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="">Fecha de la solicitud</label>
            <input value="<?php echo $solicitud->FechaSolicitud ?>" type="date" name="FechaSolicitud" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Cliente</label>
            <select name="IdCliente" class="form-control">
                <option value="">Seleccione un cliente</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente->idCliente; ?>" <?php echo ($solicitud->IdCliente == $cliente->idCliente) ? 'selected' : ''; ?>>
                        <?php echo $cliente->NombreCliente; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Servicio</label>
            <select name="IdServicio" class="form-control">
                <option value="">Seleccione un servicio</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio; ?>" <?php echo ($solicitud->IdServicio == $servicio->idServicio) ? 'selected' : ''; ?>>
                        <?php echo $servicio->NombreServicio; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <select name="IdEstado" class="form-control">
                <option value="">Seleccione un estado</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado->idEstado; ?>" <?php echo ($solicitud->IdEstado == $estado->idEstado) ? 'selected' : ''; ?>>
                        <?php echo $estado->NombreEstado; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
