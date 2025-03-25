<div class="data-container">
    <form action="/usuario/create" method="post">
        <div class="form-group">
            <label for="DocumentoUsuario">Documento</label>
            <input type="text" name="DocumentoUsuario" required maxlength="20" class="form-control">
        </div>
        <div class="form-group">
            <label for="NombreUsuario">Nombre</label>
            <input type="text" name="NombreUsuario" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <label for="CorreoUsuario">Correo</label>
            <input type="email" name="CorreoUsuario" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <label for="TelefonoUsuario">Teléfono</label>
            <input type="tel" name="TelefonoUsuario" required maxlength="10" class="form-control">
        </div>
        <div class="form-group">
            <label for="ContraseñaUsuario">Contraseña</label>
            <input type="password" name="ContraseñaUsuario" required class="form-control">
        </div>
        <div class="form-group">
            <label for="FKidRol">Rol</label>
            <select name="FKidRol" required class="form-control">
                <?php foreach($roles as $rol): ?>
                    <option value="<?php echo $rol->idRol ?>"><?php echo $rol->Rol ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>