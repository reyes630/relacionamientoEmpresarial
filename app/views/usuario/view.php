<div class="data-container">
    <h2>Gestión de Usuarios</h2>
    <a class="btn-add" href="/usuario/new">+</a>
    <?php
    if (empty($usuarios)) {
        echo "<br>No se encuentran usuarios en la base de datos";
    } else {
        foreach ($usuarios as $usuario) {
            echo "<div class='record'>
                <span>ID: {$usuario->idUsuario} - {$usuario->DocumentoUsuario} - {$usuario->NombreUsuario} - {$usuario->CorreoUsuario} - {$usuario->TelefonoUsuario} - {$usuario->NombreRol}</span>
                <div class='buttons'>
                    <a href='/usuario/view/{$usuario->idUsuario}'>Consultar</a>
                    <a href='/usuario/edit/{$usuario->idUsuario}'>Editar</a>
                    <a href='/usuario/delete/{$usuario->idUsuario}'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>