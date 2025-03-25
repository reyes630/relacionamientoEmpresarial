<div class="data-container">
    <a class="btn-add" href="/estado/new">+</a>
    <?php
    if (empty($estados)) {
        echo "<br>No se encuentran estados en la base de datos";
    } else {
        foreach ($estados as $key => $value) {
            echo "<div class='record'>
                <span>ID: $value->idEstado - $value->Estado - $value->Descripcion</span>
                <div class='buttons'>
                    <a href='/estado/view/".$value->idEstado."'>Consultar</a>
                    <a href='/estado/edit/".$value->idEstado."'>Editar</a>
                    <a href='/estado/delete/".$value->idEstado."'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>
