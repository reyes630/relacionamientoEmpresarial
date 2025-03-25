<div class="data-container">
    <?php
    if ($solicitud && is_object($solicitud)) {
        echo "<div class='record record-column'>
                <span>ID de la solicitud: $solicitud->idSolicitud</span>
                <span>Descripción: $solicitud->Descripcion</span>
                <span>Fecha de la solicitud: $solicitud->FechaSolicitud</span>
                <span>Cliente: $solicitud->NombreCliente</span>
                <span>Servicio: $solicitud->NombreServicio</span>
                <span>Estado: $solicitud->NombreEstado</span>
              </div>";
    }
    ?>
</div>
