<style>
    body {
        font-family: 'Segoe UI', system-ui, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    .data-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        color: #444;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 0.95rem;
        color: #555;
        transition: all 0.3s ease;
        background-color: #ffffff;
    }

    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.1);
        outline: none;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23555' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 35px;
    }

    .btn {
        background-color: #04324D;
        color: white;
        font-size: 0.95rem;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .btn:hover {
        background-color: #09669C;
        transform: translateY(-1px);
    }

    input[type="password"] {
        letter-spacing: 0.1em;
    }
</style>

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
            <button type="submit" class="btn">Guardar</button>
        </div>
    </form>
</div>