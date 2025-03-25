<div class="data-container">
    <?php if ($tipoEvento): ?>
        <div class="record record-column">
            <span>ID: <?php echo $tipoEvento->idTipoEvento ?></span>
            <span>Tipo de Evento: <?php echo $tipoEvento->TipoEvento ?></span>
        </div>
        <div class="buttons">
            <a href="/tipoEvento/edit/<?php echo $tipoEvento->idTipoEvento ?>" class="btn btn-primary">Editar</a>
            <a href="/tipoEvento/view" class="btn btn-secondary">Volver</a>
        </div>
    <?php else: ?>
        <p>Tipo de evento no encontrado</p>
        <a href="/tipoEvento/view" class="btn btn-secondary">Volver</a>
    <?php endif; ?>
</div>