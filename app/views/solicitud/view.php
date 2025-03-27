<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


<style>
    .table {
        border: 2px solid black;
        width: 100%;
        margin-top: 20px;
    }

    .titulos {
        display: flex;
        justify-content: space-around;
        width: 100%;
        background-color: #f5f5f5;
        padding: 10px 0;
        border-bottom: 1px solid black;
    }

    .solicitud-row {
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .solicitud-row:hover {
        background-color: #f0f0f0;
    }

    .acciones {
        display: flex;
        gap: 10px;
    }

    .acciones a {
        padding: 5px 10px;
        text-decoration: none;
        color: white;
        border-radius: 3px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .ver { background-color: #007bff; }
    .editar { background-color: #28a745; }
    .eliminar { background-color: #dc3545; }

    .fa-eye, .fa-edit, .fa-trash-alt {
        font-size: 16px;
    }
</style>

<main>
    <div class="table">
    
        <div class="titulos">
            <h3>Nombre</h3>
            <h3>Fecha Emisión</h3>
            <h3>Estado</h3>
            <h3>Tipo</h3>
            <h3>Acciones</h3>
        </div>
        <?php if (empty($solicitudes)): ?>
            <div class="solicitud-row">
                <p>No se encuentran solicitudes en la base de datos</p>
            </div>
        <?php else: ?>
            <?php foreach ($solicitudes as $solicitud): ?>
                <div class="solicitud-row">
                    <span><?php echo htmlspecialchars($solicitud->NombreCliente); ?></span>
                    <span><?php echo htmlspecialchars($solicitud->FechaCreacion); ?></span>
                    <span><?php echo htmlspecialchars($solicitud->Estado); ?></span>
                    <span><?php echo htmlspecialchars($solicitud->Servicio); ?></span>
                    <div class="acciones">
                        <a href="/solicitud/view/<?php echo $solicitud->idSolicitud; ?>" class="ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/solicitud/edit/<?php echo $solicitud->idSolicitud; ?>" class="editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/solicitud/delete/<?php echo $solicitud->idSolicitud; ?>" class="eliminar">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>