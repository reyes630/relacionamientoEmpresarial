<div class="data-container">
    <?php
    if ($estado && is_object($estado)) {
        echo "<div class='record record-column'>
                <span>ID: $estado->idEstado</span>
                <span>Estado: $estado->Estado</span>
                <span>Descripción: $estado->Descripcion</span>
              </div>";
    }
    ?>
</div>
