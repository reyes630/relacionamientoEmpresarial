<div class="data-container">
    <?php if ($tipoServicio): ?>
        <div class="record record-column">
            <span>ID: <?php echo $tipoServicio->idTipoServicio ?></span>
            <span>Tipo de Servicio: <?php echo $tipoServicio->TipoServicio ?></span>
            <span>Servicio: <?php echo $tipoServicio->NombreServicio ?></span>
        </div>
        <div class="buttons">
            <a href="/tipoServicio/edit/<?php echo $tipoServicio->idTipoServicio ?>" class="btn btn-primary">Editar</a>
            <a href="/tipoServicio/view" class="btn btn-secondary">Volver</a>
        </div>
    <?php else: ?>
        <p>Tipo de servicio no encontrado</p>
        <a href="/tipoServicio/view" class="btn btn-secondary">Volver</a>
    <?php endif; ?>
</div>