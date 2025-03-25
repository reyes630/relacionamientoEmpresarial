<div class="data-container">
    <form action="/solicitud/create" method="post">
        <div class="form-group">
            <label for="">Descripción de la solicitud</label>
            <input type="text" name="Descripcion" class="form-control" maxlength="255" required>
        </div>
        <div class="form-group">
            <label for="">Fecha de la solicitud</label>
            <input type="date" name="FechaSolicitud" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Cliente</label>
            <select name="IdCliente" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente->idCliente; ?>">
                        <?php echo $cliente->NombreCliente; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Servicio</label>
            <select name="IdServicio" class="form-control" required>
                <option value="">Seleccione un servicio</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio; ?>">
                        <?php echo $servicio->Servicio; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Estado</label>
            <select name="IdEstado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado->idEstado; ?>">
                        <?php echo $estado->Estado; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
