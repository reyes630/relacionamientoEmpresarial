<style>
    .data-container {
  max-width: 500px;
  margin: 2rem auto;
  padding: 2rem;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
<div class="data-container">
    <?php if ($usuario): ?>
        <div class="record record-column">
            <div class="field">
                <strong>ID:</strong>
                <span><?php echo $usuario->idUsuario ?></span>
            </div>
            <div class="field">
                <strong>Documento:</strong>
                <span><?php echo $usuario->DocumentoUsuario ?></span>
            </div>
            <div class="field">
                <strong>Nombre:</strong>
                <span><?php echo $usuario->NombreUsuario ?></span>
            </div>
            <div class="field">
                <strong>Correo:</strong>
                <span><?php echo $usuario->CorreoUsuario ?></span>
            </div>
            <div class="field">
                <strong>Teléfono:</strong>
                <span><?php echo $usuario->TelefonoUsuario ?></span>
            </div>
            <div class="field">
                <strong>Rol:</strong>
                <span><?php echo $usuario->NombreRol ?></span>
            </div>
        </div>
        <div class="buttons">
            <a href="/usuario/edit/<?php echo $usuario->idUsuario ?>" class="btn btn-primary" title="Editar"><i class="fas fa-pen"></i></a>
            <a href="/usuario/view" class="btn btn-secondary" title="Volver"><i class="fas fa-arrow-left"></i></a>
        </div>
    <?php else: ?>
        <p>Usuario no encontrado</p>
        <a href="/usuario/view" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    <?php endif; ?>
</div>
