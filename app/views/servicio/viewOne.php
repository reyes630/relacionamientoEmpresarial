<div class="data-container">
    <?php if ($servicio): ?>
        <div class="record record-column">
            <span>ID: <?php echo $servicio->idServicio ?></span>
            <span>Servicio: <?php echo $servicio->Servicio ?></span>
        </div>
        <div class="buttons">
            <a href="/servicio/edit/<?php echo $servicio->idServicio ?>" class="btn btn-primary">Editar</a>
            <a href="/servicio/view" class="btn btn-secondary">Volver</a>
        </div>
    <?php else: ?>
        <p>Servicio no encontrado</p>
        <a href="/servicio/view" class="btn btn-secondary">Volver</a>
    <?php endif; ?>
</div>