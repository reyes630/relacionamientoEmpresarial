<div class="data-container">
    <form action="/rol/create" method="post">
        <div class="form-group">
            <label for="Rol">Nombre del Rol</label>
            <input type="text" name="Rol" required maxlength="45" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/rol/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>