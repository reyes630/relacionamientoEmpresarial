<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<style>
    .table {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin-top: 20px;
        overflow: hidden;
    }

    .titulos {
        display: flex;
        justify-content: space-around;        
        text-align: left;
        width: 100%;
        background-color: #ffffff;
        padding: 20px 0;
        font-family: 'Segoe UI', system-ui, sans-serif;
        color: #444;
        font-size: 0.7rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border-bottom: 2px solid #f0f0f0;

        h3 {
            margin: 0 40px;
        }


    }

    .solicitud-row {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 15px 0;
        transition: all 0.3s ease;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .solicitud-row:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
    }

    span {
        color: #555;
        font-size: 0.95rem;
    }

    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 10px;
    }

    .status-recent {
        background-color: #2ecc71;
    }

    .status-medium {
        background-color: #f1c40f;
    }

    .status-old {
        background-color: #e74c3c;
    }

    .service-badge {
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .service-badge.light {
        color: #333;
    }

    .service-badge.dark {
        color: #fff;
    }
</style>

<main>
    <div class="table">

        <div class="titulos">
            <h3></h3>
            <h3>Nombre Cliente</h3>
            <h3>Fecha Emisión</h3>
            <h3>Estado</h3>
            <h3>Servicio</h3>
            <h3>Acciones</h3>
        </div>
        <?php if (empty($solicitudes)): ?>
            <div class="solicitud-row">
                <p>No se encuentran solicitudes en la base de datos</p>
            </div>
        <?php else: ?>
            <?php foreach ($solicitudes as $solicitud): ?>
                <div class="solicitud-row">
                    <?php
                    $fechaCreacion = new DateTime($solicitud->FechaCreacion);
                    $now = new DateTime();
                    $diff = $fechaCreacion->diff($now)->days;

                    $statusClass = '';
                    if ($diff <= 7) {
                        $statusClass = 'status-recent';  // Verde - menos de 7 días
                    } elseif ($diff <= 15) {
                        $statusClass = 'status-medium'; // Amarillo - entre 7 y 15 días
                    } else {
                        $statusClass = 'status-old';    // Rojo - más de 15 días
                    }
                    ?>
                    <span>
                        <div class="status-indicator <?php echo $statusClass; ?>"></div>
                    </span>
                    <span><?php echo htmlspecialchars($solicitud->NombreCliente); ?></span>
                    <span><?php echo htmlspecialchars($solicitud->FechaCreacion); ?></span>
                    <span><?php echo htmlspecialchars($solicitud->Estado); ?></span>
                    <span>
                        <?php
                        // Determinar si el color de fondo es claro u oscuro
                        $hex = ltrim($solicitud->Color, '#');
                        $r = hexdec(substr($hex, 0, 2));
                        $g = hexdec(substr($hex, 2, 2));
                        $b = hexdec(substr($hex, 4, 2));
                        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
                        $textClass = $brightness > 128 ? 'light' : 'dark';
                        ?>
                        <div class="service-badge <?php echo $textClass; ?>"
                            style="background-color: <?php echo htmlspecialchars($solicitud->Color); ?>">
                            <?php echo htmlspecialchars($solicitud->Servicio); ?>
                        </div>
                    </span>
                    <div class=" buttons">
                        <a href="/solicitud/view/<?php echo $solicitud->idSolicitud; ?>" class="ver buttons">
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

    <!-- Contenedor del Modal -->
    <div id="modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-body">
                <!-- Aquí se cargará el contenido del archivo modal -->
            </div>
        </div>
    </div>

    <style>
        .modal {
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            height: 700px;
            max-width: 700px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: #888;
            cursor: pointer;
        }
    </style>

    <script>
       /*  document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modal');
            const modalBody = document.getElementById('modal-body');
            const closeModal = document.querySelector('.close');

            // Cerrar modal
            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
                modalBody.innerHTML = ''; 
            });

            // Capturar clic en cualquier botón editar
            document.querySelectorAll('.editar').forEach(btn => {
                btn.addEventListener('click', async (e) => {
                    e.preventDefault();
                    const url = btn.getAttribute('href');

                    try {
                        const response = await fetch(url);
                        const html = await response.text();
                        modalBody.innerHTML = html;
                        modal.style.display = 'flex';
                    } catch (error) {
                        modalBody.innerHTML = "<p>Error al cargar el contenido 😞</p>";
                    }
                });
            });
        }); */

       


    </script>

</main>