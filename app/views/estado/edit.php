<div class="data-container">
    <form action="/estado/update" method="post">
        <div class="form-group">
            <label for="">ID del estado</label>
            <input readonly value="<?php echo $estado->idEstado ?>" type="number" name="idEstado" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nombre del estado</label>
            <input type="text" value="<?php echo $estado->Estado ?>" name="Estado" class="form-control" maxlength="45">
        </div>
        <div class="form-group">
            <label for="">Descripción del estado</label>
            <input value="<?php echo $estado->Descripcion ?>" type="text" name="Descripcion" class="form-control" maxlength="100">
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
