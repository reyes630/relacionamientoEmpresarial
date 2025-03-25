<div class="data-container">
    <h2>Gestión de Roles</h2>
    <a class="btn-add" href="/rol/new">+</a>
    <?php
    if (empty($roles)) {
        echo "<br>No se encuentran roles en la base de datos";
    } else {
        foreach ($roles as $rol) {
            echo "<div class='record'>
                <span>ID: {$rol->idRol} - {$rol->Rol}</span>
                <div class='buttons'>
                    <a href='/rol/view/{$rol->idRol}'>Consultar</a>
                    <a href='/rol/edit/{$rol->idRol}'>Editar</a>
                    <a href='/rol/delete/{$rol->idRol}'>Eliminar</a>
                </div>
            </div>";
        }
    }
    ?>
</div>