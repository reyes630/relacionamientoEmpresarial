<div class="login-container">
        <?php 
        if(isset($errors)){
            echo "<div class='errors'>";
            echo $errors;
            echo "</div>";
        }
        ?>
    <h2>Iniciar sesión</h2>
    <form action="/login/init" method="post">
        <div class="input-group">
            <label for="">Usuario</label>
            <input type="text" name="txtUser" id="txtUser" required>
        </div>
        <div class="input-group">
            <label for="">Contraseña</label>
            <input type="password" name="txtPassword" id="txtPassword" required>
        </div>
        <div class="input-group">
            <button type="submit">Ingresar</button>
        </div>
    </form>

    <div class="btn-formulario">
        <a href="/formulario/new">
        <button>Formulario Registro Solicitud</button>
        </a>
        
    </div>
</div>