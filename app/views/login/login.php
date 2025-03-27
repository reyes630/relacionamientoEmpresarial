<?php
if (isset($_SESSION['error'])) {
    echo '<div class="error-message" style="color: red; text-align: center; margin: 10px 0;">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>

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
    <script>
        document.querySelector('form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const documento = document.getElementById('username').value;
            const contraseña = document.getElementById('password').value;
            
            try {
                const response = await fetch('/login/handleLogin', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ documento, contraseña })
                });

                const data = await response.json();
                
                if (data.success) {
                    window.location.href = '/usuario/view';
                } else {
                    const errorDiv = document.querySelector('.error-message') || document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.style.color = 'red';
                    errorDiv.style.textAlign = 'center';
                    errorDiv.style.margin = '10px 0';
                    errorDiv.textContent = data.error || 'Error de inicio de sesión';
                    
                    if (!document.querySelector('.error-message')) {
                        document.querySelector('.form').insertBefore(errorDiv, document.querySelector('form'));
                    }
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
</section>
