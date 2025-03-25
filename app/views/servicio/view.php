<div class="data-container">
    <h2>Gestión de Servicios</h2>
    <a class="btn-add" href="/servicio/new">+</a>
    <?php
    if (empty($servicios)) {
        echo "<br>No se encuentran servicios en la base de datos";
    } else {
        foreach ($servicios as $servicio) {
            echo "<div class='record'>
                <span>ID: {$servicio->idServicio} - {$servicio->Servicio}</span>
                <div class='buttons'>
                    <a href='/servicio/view/{$servicio->idServicio}'>Consultar</a>
                    <a href='/servicio/edit/{$servicio->idServicio}'>Editar</a>
                    <a href='/servicio/delete/{$servicio->idServicio}'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>