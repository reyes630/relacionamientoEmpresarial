<div class="data-container">
    <?php
    if ($cliente && is_object($cliente)) {
        echo "<div class='record record-column'>
                <span>ID: $cliente->idCliente</span>
                <span>Documento: $cliente->DocumentoCliente</span>
                <span>Nombre: $cliente->NombreCliente</span>
                <span>Correo: $cliente->CorreoCliente</span>
                <span>Teléfono: $cliente->TelefonoCliente</span>
              </div>";
    }
    ?>
</div>