<div class="data-container">
    <form action="/estado/create" method="post">
        <div class="form-group">
            <label for="">Nombre del estado</label>
            <input type="text" name="Estado" class="form-control" maxlength="45" required>
        </div>
        <div class="form-group">
            <label for="">Descripción del estado</label>
            <input type="text" name="Descripcion" class="form-control" maxlength="100" required>
        </div>
        <div class="form-group">
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>
