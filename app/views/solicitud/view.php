<div class="data-container">
    <a class="btn-add" href="/solicitud/new">+</a>
    <?php
    if (empty($solicitudes)) {
        echo "<br>No se encuentran solicitudes en la base de datos";
    } else {
        foreach ($solicitudes as $key => $value) {
            echo "<div class='record'>
                <span>ID: $value->idSolicitud - $value->Descripcion - $value->FechaSolicitud - Cliente: $value->NombreCliente - Servicio: $value->NombreServicio - Estado: $value->NombreEstado</span>
                <div class='buttons'>
                    <a href='/solicitud/view/".$value->idSolicitud."'>Consultar</a>
                    <a href='/solicitud/edit/".$value->idSolicitud."'>Editar</a>
                    <a href='/solicitud/delete/".$value->idSolicitud."'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>
