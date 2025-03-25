<div class="data-container">
    <?php if ($rol): ?>
        <div class="record record-column">
            <span>ID: <?php echo $rol->idRol ?></span>
            <span>Rol: <?php echo $rol->Rol ?></span>
        </div>
        <div class="buttons">
            <a href="/rol/edit/<?php echo $rol->idRol ?>" class="btn btn-primary">Editar</a>
            <a href="/rol/view" class="btn btn-secondary">Volver</a>
        </div>
    <?php else: ?>
        <p>Rol no encontrado</p>
        <a href="/rol/view" class="btn btn-secondary">Volver</a>
    <?php endif; ?>
</div>