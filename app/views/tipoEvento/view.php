<div class="data-container">
    <h2>Gestión de Tipos de Evento</h2>
    <a class="btn-add" href="/tipoEvento/new">+</a>
    <?php
    if (empty($tiposEvento)) {
        echo "<br>No se encuentran tipos de evento en la base de datos";
    } else {
        foreach ($tiposEvento as $tipo) {
            echo "<div class='record'>
                <span>ID: {$tipo->idTipoEvento} - {$tipo->TipoEvento}</span>
                <div class='buttons'>
                    <a href='/tipoEvento/view/{$tipo->idTipoEvento}'>Consultar</a>
                    <a href='/tipoEvento/edit/{$tipo->idTipoEvento}'>Editar</a>
                    <a href='/tipoEvento/delete/{$tipo->idTipoEvento}'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>