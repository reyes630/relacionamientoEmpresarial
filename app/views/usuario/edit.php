<div class="data-container">
    <form action="/usuario/update" method="post">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario ?>">
        <div class="form-group">
            <label for="DocumentoUsuario">Documento</label>
            <input type="text" name="DocumentoUsuario" value="<?php echo $usuario->DocumentoUsuario ?>" required maxlength="20" class="form-control">
        </div>
        <div class="form-group">
            <label for="NombreUsuario">Nombre</label>
            <input type="text" name="NombreUsuario" value="<?php echo $usuario->NombreUsuario ?>" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <label for="CorreoUsuario">Correo</label>
            <input type="email" name="CorreoUsuario" value="<?php echo $usuario->CorreoUsuario ?>" required maxlength="100" class="form-control">
        </div>
        <div class="form-group">
            <label for="TelefonoUsuario">Teléfono</label>
            <input type="tel" name="TelefonoUsuario" value="<?php echo $usuario->TelefonoUsuario ?>" required maxlength="10" class="form-control">
        </div>
        <div class="form-group">
            <label for="ContraseñaUsuario">Contraseña (dejar vacío para mantener la actual)</label>
            <input type="password" name="ContraseñaUsuario" class="form-control">
        </div>
        <div class="form-group">
            <label for="FKidRol">Rol</label>
            <select name="FKidRol" required class="form-control">
                <?php foreach($roles as $rol): ?>
                    <option value="<?php echo $rol->idRol ?>" <?php echo ($rol->idRol == $usuario->FKidRol) ? 'selected' : '' ?>>
                        <?php echo $rol->Rol ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>