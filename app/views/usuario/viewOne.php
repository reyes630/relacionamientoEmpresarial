<div class="data-container">
    <?php if ($usuario): ?>
        <div class="record record-column">
            <span>ID: <?php echo $usuario->idUsuario ?></span>
            <span>Documento: <?php echo $usuario->DocumentoUsuario ?></span>
            <span>Nombre: <?php echo $usuario->NombreUsuario ?></span>
            <span>Correo: <?php echo $usuario->CorreoUsuario ?></span>
            <span>Teléfono: <?php echo $usuario->TelefonoUsuario ?></span>
            <span>Rol: <?php echo $usuario->NombreRol ?></span>
        </div>
        <div class="buttons">
            <a href="/usuario/edit/<?php echo $usuario->idUsuario ?>" class="btn btn-primary">Editar</a>
            <a href="/usuario/view" class="btn btn-secondary">Volver</a>
        </div>
    <?php else: ?>
        <p>Usuario no encontrado</p>
        <a href="/usuario/view" class="btn btn-secondary">Volver</a>
    <?php endif; ?>
</div>