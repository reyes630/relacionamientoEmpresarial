<div class="data-container">
    <form action="/servicio/create" method="post">
        <div class="form-group">
            <label for="Servicio">Nombre del Servicio</label>
            <input type="text" name="Servicio" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/servicio/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>