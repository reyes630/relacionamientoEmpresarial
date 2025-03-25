<div class="data-container">
    <h2>Gestión de Tipos de Servicio</h2>
    <a class="btn-add" href="/tipoServicio/new">+</a>
    <?php
    if (empty($tiposServicio)) {
        echo "<br>No se encuentran tipos de servicio en la base de datos";
    } else {
        foreach ($tiposServicio as $tipo) {
            echo "<div class='record'>
                <span>ID: {$tipo->idTipoServicio} - {$tipo->TipoServicio} - Servicio: {$tipo->NombreServicio}</span>
                <div class='buttons'>
                    <a href='/tipoServicio/view/{$tipo->idTipoServicio}'>Consultar</a>
                    <a href='/tipoServicio/edit/{$tipo->idTipoServicio}'>Editar</a>
                    <a href='/tipoServicio/delete/{$tipo->idTipoServicio}'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>