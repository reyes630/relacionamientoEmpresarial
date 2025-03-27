<div class="data-container">
    <h2 class="form-title">Detalles de la Solicitud</h2>
    <?php
    if ($solicitud && is_object($solicitud)) {
        echo "<div class='record-details'>
                <div class='detail-group'>
                    <label>ID de la solicitud</label>
                    <span>{$solicitud->idSolicitud}</span>
                </div>
                <div class='detail-group'>
                    <label>Descripción</label>
                    <span>{$solicitud->DescripcionNecesidad}</span>
                </div>
                <div class='detail-group'>
                    <label>Fecha de la solicitud</label>
                    <span>{$solicitud->FechaEvento}</span>
                </div>
                <div class='detail-group'>
                    <label>Fecha de creación</label>
                    <span>{$solicitud->FechaCreacion}</span>
                </div>
                <div class='detail-group'>
                    <label>Cliente</label>
                    <span>{$solicitud->NombreCliente}</span>
                </div>
                <div class='detail-group'>
                    <label>Servicio</label>
                    <span>{$solicitud->Servicio}</span>
                </div>
                <div class='detail-group'>
                    <label>Estado</label>
                    <span>{$solicitud->Estado} - {$solicitud->EstadoDescripcion}</span>
                </div>
              </div>";
    }
    ?>
</div>

<style>
    .data-container {
        max-width: 600px;
        margin: 2rem auto;
        margin-bottom: 4rem;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        padding: 2rem;
        position: relative;
    }

    .form-title {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        text-align: center;
        font-weight: 600;
    }

    .record-details {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .detail-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .detail-group label {
        color: #2c3e50;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .detail-group span {
        padding: 0.75rem;
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    @media (max-width: 768px) {
        .data-container {
            margin: 1rem auto 3rem auto;
            padding: 1.5rem;
            width: 90%;
        }

        .form-title {
            font-size: 1.5rem;
        }

        .detail-group span {
            padding: 0.6rem;
        }
    }
</style>