<section class="upperSide">
    <div class="logoSena">
        <img src="images/logoSenaVerde.png" alt="Sena">
    </div>
    <div class="tituloSitio">
        <h2>Relacionamiento Empresarial</h2>
    </div>
    <div class="LinkForm">
        <a href="">
            <h3>Formulario Solicitud</h3>
        </a>
    </div>
</section>

<section class="FormularioInicio">
    <div class="form">
        <h2>FUNCIONARIO</h2>
        <form action="/login/handleLogin" method="POST"> 
            <div class="User">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="documento" required>
            </div>
            <div class="Password">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="contraseña" required>
            </div>
            <input class="ingresar" type="submit" value="Ingresar">
        </form>
        <div class="OlividoPassword">
            <p>¿Olvidó su contraseña?</p>
        </div>
    </div>
</section>
