<div class="data-container">
    <form action="/tipoEvento/create" method="post">
        <div class="form-group">
            <label for="TipoEvento">Nombre del Tipo de Evento</label>
            <input type="text" name="TipoEvento" required maxlength="50" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/tipoEvento/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>