<div class="data-container">
    <?php if ($tipoServicio): ?>
        <div class="record">
            <div class="field">
                <strong>ID:</strong>
                <span><?php echo $tipoServicio->idTipoServicio ?></span>
            </div>
            <div class="field">
                <strong>Tipo de Servicio:</strong>
                <span><?php echo $tipoServicio->TipoServicio ?></span>
            </div>
            <div class="field">
                <strong>Servicio:</strong>
                <span><?php echo $tipoServicio->NombreServicio ?></span>
            </div>
        </div>
        <div class="buttons">
            <a href="/tipoServicio/edit/<?php echo $tipoServicio->idTipoServicio ?>" title="Editar"><i class="fas fa-pen"></i></a>
            <a href="/tipoServicio/view" title="Volver"><i class="fas fa-arrow-left"></i></a>
        </div>
    <?php else: ?>
        <p>Tipo de servicio no encontrado</p>
        <a href="/tipoServicio/view" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
    <?php endif; ?>
</div>
