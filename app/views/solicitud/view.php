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

    .titulos,
    .solicitud-row {
        border-bottom: 3px solid #f0f0f0;
        display: grid;
        grid-template-columns: 60px 1fr 1fr 1fr 1fr 1.5fr;
        align-items: center;
        text-align: center;
        gap: 10px;
    }

    .titulos div {
        font-weight: bold;
        padding: 15px 0;
        font-size: 1rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .solicitud-row div {
        margin: 6px 0;
        padding: 12px 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.98rem;
    }

    .solicitud-row {
        transition: background 0.3s;
        border-bottom: 1px solid #f0f0f0;
    }

    .solicitud-row:hover {
        background: #f1f7fa;
    }

    span {
        color: #555;
        font-size: 0.95rem;
    }

    .status-indicator {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: inline-block;
        margin: 0 auto;
        border: 2px solid #e0e0e0;
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

    .buttons a {
        margin: 0 5px;
        color: #fff;
        font-size: 1.1rem;
        transition: color 0.2s;
    }

    .buttons a:hover {
        color: #09669C;
        color: #fff;
    }

    /* Estilo para la barra de búsqueda */
    .search-bar {
        position: relative;
        flex-grow: 1;
        max-width: 300px;
        margin-left: 50px;
        border-bottom: 1px solid #e0e0e0;
    }

    .search-bar input[type="text"] {
        width: 100%;
        padding: 10px 15px 10px 35px;
        font-size: 16px;
        border: none;
        border-radius: 30px;
        outline: none;
        background-color: white;
    }

    .search-bar .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: gray;
    }

    .filters {
        display: flex;
        padding: 20px;
        gap: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        /* Esto centra el elemento */
    }

    .search-container {
        flex: 1;
        min-width: 200px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }

    .form-group label {
        font-size: 14px;
        color: #444;
        font-weight: 700;
    }

    .form-control {
        padding: 10px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 30px;
        font-size: 14px;
        width: 100%;
        background-color: white;
        color: #333;
        outline: none;
        transition: all 0.3s ease;
    }

    .no-results {
        font-size: 20px;
        color: red;
        text-align: center;
        display: none;
    }

    .form-control:focus {
        border-color: #09669C;
        box-shadow: 0 0 0 2px rgba(9, 102, 156, 0.1);
    }

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

    /* Responsive */
    @media (max-width: 900px) {

        .titulos,
        .solicitud-row {
            grid-template-columns: 30px 1fr 1fr 1fr 1fr 1fr;
            font-size: 0.95rem;
        }

        .titulos>div,
        .solicitud-row>div {
            padding: 8px 2px;
            font-size: 0.95rem;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
        }

        .filters {
            width: 95%;
            flex-direction: column;
            padding: 15px;
        }

        .search-container {
            width: 100%;
        }
    }
</style>


<!-- Modificación del HTML de los filtros -->
<div class="filters">
    <div class="search-container">
        <div class="form-group">
            <label>Buscar cliente</label>
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input id="searchInput" type="text" placeholder="Nombre del cliente...">
            </div>
            <p id="noResults" class="no-results">No se encontraron resultados.</p>
        </div>
    </div>
    <div class="search-container">
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="IdEstado" class="form-control">
                <option value="">Seleccione un estado</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado->idEstado; ?>">
                        <?php echo $estado->Estado; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="search-container">
        <div class="form-group">
            <label>Filtrar servicios</label>
            <select id="servicio" name="IdServicio" class="form-control">
                <option value="">Todos los servicios</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio; ?>">
                        <?php echo $servicio->Servicio; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<main>


    <div class="table">
        <div class="titulos">
            <div></div>
            <div>Nombre Cliente</div>
            <div>Fecha Emisión</div>
            <div>Estado</div>
            <div>Servicio</div>
            <div>Acciones</div>
        </div>
        <?php if (empty($solicitudes)): ?>
            <div class="solicitud-row">
                <div colspan="6" style="text-align:center;">No se encuentran solicitudes en la base de datos</div>
            </div>
        <?php else: ?>
            <?php foreach ($solicitudes as $solicitud): ?>
                <?php
                // Semaforización: verde < 7 días, amarillo 7-15, rojo > 15
                $dias = (new DateTime())->diff(new DateTime($solicitud->FechaCreacion))->days;
                if ($dias < 7) {
                    $statusClass = "status-recent"; // verde
                } elseif ($dias <= 15) {
                    $statusClass = "status-medium"; // amarillo
                } else {
                    $statusClass = "status-old"; // rojo
                }
                ?>
                <div class="solicitud-row">
                    <div>
                        <span class="status-indicator <?php echo $statusClass; ?>"></span>
                    </div>
                    <div><?php echo htmlspecialchars($solicitud->NombreCliente); ?></div>
                    <div><?php echo htmlspecialchars($solicitud->FechaCreacion); ?></div>
                    <div><?php echo htmlspecialchars($solicitud->Estado); ?></div>
                    <div>
                        <div class="service-badge <?php echo $textClass; ?>"
                            style="background-color: <?php echo htmlspecialchars($solicitud->Color); ?>">
                            <?php echo htmlspecialchars($solicitud->Servicio); ?>
                        </div>
                    </div>
                    <div class="buttons">
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


        
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const estadoSelect = document.getElementById('estado');
            const servicioSelect = document.getElementById('servicio');
            const solicitudRows = document.querySelectorAll('.solicitud-row');
            const noResults = document.getElementById('noResults');

            function filterSolicitudes() {
                const searchTerm = searchInput.value.toLowerCase();
                const estadoSelected = estadoSelect.value;
                const servicioSelected = servicioSelect.value;
                let visibleRows = 0;

                solicitudRows.forEach(row => {
                    const nombreCliente = row.children[1].textContent.toLowerCase();
                    const estado = row.children[3].textContent;
                    const servicio = row.children[4].textContent.trim();

                    const matchesSearch = nombreCliente.includes(searchTerm);
                    const matchesEstado = estadoSelected === '' || estado === estadoSelect.options[estadoSelect.selectedIndex].text;
                    const matchesServicio = servicioSelected === '' || servicio === servicioSelect.options[servicioSelect.selectedIndex].text;

                    // Si todas las condiciones son verdaderas mostrara alguna opcion existente
                    if (matchesSearch && matchesEstado && matchesServicio) {
                        row.style.display = '';
                        visibleRows++;
                        // Si alguna es falsa entonces no mostrará ninguna
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Mostrar mensaje de "No se encontraron resultados" si no hay coincidencias
                noResults.style.display = visibleRows === 0 ? 'block' : 'none';
            }

            // Eventos para los filtros, esto permite que funcionen en tiempo real
            searchInput.addEventListener('input', filterSolicitudes);
            estadoSelect.addEventListener('change', filterSolicitudes);
            servicioSelect.addEventListener('change', filterSolicitudes);
        });
    </script>

</main>