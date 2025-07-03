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
        grid-template-columns: 40px 1fr 1fr 0.7fr 1fr 1.2fr;
        /* Estado más angosto */
        align-items: center;
        text-align: center;
        gap: 6px;
    }

    .titulos div {
        font-weight: bold;
        padding: 8px 0;
        font-size: 0.92rem;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .solicitud-row div {
        margin: 2px 0;
        padding: 6px 4px;
        font-size: 0.88rem;
        display: flex;
        justify-content: center;
        align-items: center;
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
        padding: 3px 8px;
        border-radius: 14px;
        display: inline-block;
        font-size: 0.82rem;
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
        margin: 0 1px;
        color: #fff;
        font-size: 0.92rem;
        padding: 1px 7px;
        /* Reduce el padding vertical (height) */
        border-radius: 18px;
        background: #04324D;
        display: inline-flex;
        align-items: center;
        transition: background 0.2s, color 0.2s;
    }

    .buttons a:hover {
        color: #09669C;
        color: #fff;
    }

    .buttons a i {
        font-size: 0.8rem;
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

    /* ESTILOS ESPECÍFICOS PARA EL MODAL DEL ADMIN LAYOUT */
    /* Renombramos las clases para evitar conflictos */
    .logout-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        /* Mayor z-index que el modal original */
        backdrop-filter: blur(4px);
    }

    .logout-modal-overlay.show {
        display: flex;
    }

    .logout-modal-content {
        background: white;
        border-radius: 12px;
        padding: 30px;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        text-align: center;
        transform: scale(0.95);
        transition: transform 0.2s ease;
    }

    .logout-modal-overlay.show .logout-modal-content {
        transform: scale(1);
    }

    body.dark-mode .logout-modal-content {
        background: #2d2d2d;
        color: #e0e0e0;
    }

    .logout-modal-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: #fef3cd;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body.dark-mode .logout-modal-icon {
        background: #654321;
    }

    .logout-modal-icon i {
        font-size: 24px;
        color: #f59e0b;
    }

    .logout-modal-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #374151;
    }

    body.dark-mode .logout-modal-title {
        color: #e0e0e0;
    }

    .logout-modal-message {
        font-size: 16px;
        color: #6b7280;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    body.dark-mode .logout-modal-message {
        color: #9ca3af;
    }

    .logout-modal-buttons {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .logout-modal-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        min-width: 80px;
    }

    .logout-modal-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .logout-modal-btn-cancel:hover {
        background: #e5e7eb;
    }

    body.dark-mode .logout-modal-btn-cancel {
        background: #4b5563;
        color: #e0e0e0;
    }

    body.dark-mode .logout-modal-btn-cancel:hover {
        background: #6b7280;
    }

    .logout-modal-btn-confirm {
        background: #dc2626;
        color: white;
    }

    .logout-modal-btn-confirm:hover {
        background: #b91c1c;
    }

    /* Modal original para otras funcionalidades */
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
            grid-template-columns: 20px 1fr 1fr 0.7fr 1fr 1.2fr;
            font-size: 0.8rem;
        }

        .titulos>div,
        .solicitud-row>div {
            padding: 4px 1px;
            font-size: 0.8rem;
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

    .archivados-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #fff;
        /* Fondo blanco */
        color: #09669C;
        /* Texto azul */
        padding: 7px 18px;
        border-radius: 20px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        border: 2px solid #09669C;
        /* Borde azul */
        transition: background 0.2s, color 0.2s;
    }

    .archivados-btn:hover {
        background: #09669C;
        /* Fondo azul al pasar */
        color: #fff;
        /* Texto blanco al pasar */
    }

    .archivados-btn i {
        font-size: 1.1rem;
    }

    /* MODO OSCURO PARA TABLA Y FILTROS */
    /* filepath: e:\RelacionamientoEmpresarial\app\views\solicitud\view.php */

    body.dark-mode .table {
        background: #23272a;
        color: #e0e0e0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
    }

    body.dark-mode .titulos,
    body.dark-mode .solicitud-row {
        background: #23272a;
        border-bottom: 3px solid #393e42;
        color: #e0e0e0;
    }

    body.dark-mode .titulos div {
        color: #e0e0e0;
    }

    body.dark-mode .solicitud-row div {
        color: #e0e0e0;
    }

    body.dark-mode .solicitud-row:hover {
        background: #2d3238;
    }

    body.dark-mode .service-badge.light {
        color: #e0e0e0;
        background: #393e42;
    }

    body.dark-mode .service-badge.dark {
        color: #fff;
        background: #393e42;
    }

    body.dark-mode .status-indicator {
        border: 2px solid #393e42;
    }

    body.dark-mode .filters {
        background: #23272a;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
    }

    body.dark-mode .form-group label {
        color: #e0e0e0;
    }

    body.dark-mode .form-control,
    body.dark-mode input,
    body.dark-mode select {
        background: #393e42;
        color: #e0e0e0 !important;
        border-color: #393e42;
    }

    body.dark-mode .form-control:focus {
        border-color: #09669C;
        box-shadow: 0 0 0 2px rgba(9, 102, 156, 0.2);
    }

    body.dark-mode .search-bar {
        background: #393e42;
        border-bottom: 1px solid #393e42;
    }

    body.dark-mode .search-bar input[type="text"] {
        background: #393e42;
        color: #e0e0e0;
    }

    body.dark-mode .search-bar .search-icon {
        color: #b0b0b0;
    }

    body.dark-mode .no-results {
        color: #ff7675;
    }

    /* MODAL DE CONFIRMACIÓN DE ELIMINACIÓN */
    .delete-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10001;
        /* Mayor que el modal de logout */
        backdrop-filter: blur(4px);
        animation: fadeIn 0.3s ease;
    }

    .delete-modal-overlay.show {
        display: flex;
    }

    .delete-modal-content {
        background: white;
        border-radius: 12px;
        padding: 30px;
        max-width: 420px;
        width: 90%;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        text-align: center;
        transform: scale(0.9);
        transition: transform 0.3s ease;
        position: relative;
    }

    .delete-modal-overlay.show .delete-modal-content {
        transform: scale(1);
    }

    .delete-modal-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: #fee2e2;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s infinite;
    }

    .delete-modal-icon i {
        font-size: 28px;
        color: #dc2626;
    }

    .delete-modal-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #374151;
    }

    .delete-modal-message {
        font-size: 16px;
        color: #6b7280;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .delete-modal-client-name {
        font-weight: 600;
        color: #dc2626;
    }

    .delete-modal-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .delete-modal-btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        min-width: 100px;
        position: relative;
        overflow: hidden;
    }

    .delete-modal-btn:hover {
        transform: translateY(-1px);
    }

    .delete-modal-btn-cancel {
        background: #f3f4f6;
        color: #374151;
        border: 2px solid #e5e7eb;
    }

    .delete-modal-btn-cancel:hover {
        background: #e5e7eb;
        border-color: #d1d5db;
    }

    .delete-modal-btn-confirm {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        border: 2px solid transparent;
        box-shadow: 0 4px 14px 0 rgba(220, 38, 38, 0.39);
    }

    .delete-modal-btn-confirm:hover {
        background: linear-gradient(135deg, #b91c1c, #991b1b);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
    }

    /* Animaciones */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    /* MODO OSCURO */
    body.dark-mode .delete-modal-content {
        background: #2d2d2d;
        color: #e0e0e0;
    }

    body.dark-mode .delete-modal-icon {
        background: #7f1d1d;
    }

    body.dark-mode .delete-modal-icon i {
        color: #fca5a5;
    }

    body.dark-mode .delete-modal-title {
        color: #e0e0e0;
    }

    body.dark-mode .delete-modal-message {
        color: #9ca3af;
    }

    body.dark-mode .delete-modal-client-name {
        color: #fca5a5;
    }

    body.dark-mode .delete-modal-btn-cancel {
        background: #4b5563;
        color: #e0e0e0;
        border-color: #6b7280;
    }

    body.dark-mode .delete-modal-btn-cancel:hover {
        background: #6b7280;
        border-color: #9ca3af;
    }

    body.dark-mode .delete-modal-btn-confirm {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
    }

    /* Responsive */
    @media (max-width: 480px) {
        .delete-modal-content {
            padding: 20px;
            margin: 20px;
        }

        .delete-modal-buttons {
            flex-direction: column;
        }

        .delete-modal-btn {
            width: 100%;
        }
    }
</style>


<?php
function adjustBrightness($hex, $steps)
{
    // Steps: -255 (más oscuro) a 255 (más claro)
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $r = max(0, min(255, hexdec(substr($hex, 0, 2)) + $steps));
    $g = max(0, min(255, hexdec(substr($hex, 2, 2)) + $steps));
    $b = max(0, min(255, hexdec(substr($hex, 4, 2)) + $steps));
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}
?>


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


<?php
// Detectar si estamos en la sección de archivadas
$isArchivadas = (isset($_GET['archivadas']) && $_GET['archivadas'] == '1') ||
    (isset($esArchivadas) && $esArchivadas) ||
    (strpos($_SERVER['REQUEST_URI'], '/solicitud/archivadas') !== false);
?>
<div style="display: flex; justify-content: flex-end; margin-bottom: 18px;">
    <?php if ($isArchivadas): ?>
        <a href="/solicitud/view" class="archivados-btn">
            <i class="fas fa-list"></i> Mis solicitudes
        </a>
    <?php else: ?>
        <a href="/solicitud/archivadas" class="archivados-btn">
            <i class="fas fa-archive"></i> Archivados
        </a>
    <?php endif; ?>
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
            <?php if (in_array($_SESSION['rol'], [3, 4])): ?>
                <div class="solicitud-row">
                    <div colspan="6" style="text-align:center; width:100%;">Aún no tienes solicitudes asignadas.</div>
                </div>
            <?php else: ?>
                <div class="solicitud-row">
                    <div colspan="6" style="text-align:center; width:100%;">No se encuentran solicitudes en la base de datos</div>
                </div>
            <?php endif; ?>
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
                // Mostrar botón archivar solo si estado es Resuelto (4) o Cerrado (8)
                $mostrarArchivar = in_array($solicitud->FKestado ?? $solicitud->idEstado ?? null, [4, 8]);
                // Mostrar botón eliminar solo si es administrador (rol 1)
                $mostrarEliminar = isset($_SESSION['rol']) && $_SESSION['rol'] == 1;

                // Colores para servicio
                $colorOriginalServicio = $solicitud->Color;
                $colorFondoServicio = adjustBrightness($colorOriginalServicio, 80);   // Más claro
                $colorBordeYTextoServicio = adjustBrightness($colorOriginalServicio, -60); // Más oscuro

                // Colores para estado
                $colorOriginalEstado = $solicitud->ColorEstado ?? '#cccccc';
                $colorFondoEstado = adjustBrightness($colorOriginalEstado, 80);
                $colorBordeYTextoEstado = adjustBrightness($colorOriginalEstado, -60);
                ?>
                <div class="solicitud-row">
                    <div>
                        <span class="status-indicator <?php echo $statusClass; ?>"></span>
                    </div>
                    <div><?php echo htmlspecialchars($solicitud->NombreCliente); ?></div>
                    <div><?php echo htmlspecialchars($solicitud->FechaCreacion); ?></div>
                    <div>
                        <span class="service-badge"
                            style="
                                background-color: <?php echo $colorFondoEstado; ?>;
                                color: <?php echo $colorBordeYTextoEstado; ?>;
                                border: 1.5px solid <?php echo $colorBordeYTextoEstado; ?>;
                            ">
                            <?php echo htmlspecialchars($solicitud->Estado); ?>
                        </span>
                    </div>
                    <div>
                        <span class="service-badge"
                            style="
                                background-color: <?php echo $colorFondoServicio; ?>;
                                color: <?php echo $colorBordeYTextoServicio; ?>;
                                border: 1.5px solid <?php echo $colorBordeYTextoServicio; ?>;
                            ">
                            <?php echo htmlspecialchars($solicitud->Servicio); ?>
                        </span>
                    </div>
                    <div class="buttons">
                        <a href="/solicitud/view/<?php echo $solicitud->idSolicitud; ?>" class="ver buttons">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/solicitud/edit/<?php echo $solicitud->idSolicitud; ?>" class="editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php if ($mostrarEliminar): ?>
                            <a href="/solicitud/delete/<?php echo $solicitud->idSolicitud; ?>" class="eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($mostrarArchivar): ?>
                            <a href="#" class="archivar" title="Archivar" data-id="<?php echo $solicitud->idSolicitud; ?>">
                                <i class="fas fa-archive"></i>
                            </a>
                        <?php endif; ?>
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
        // JS para archivar solicitudes
        document.querySelectorAll('.archivar').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                const row = this.closest('.solicitud-row');
                const clientName = row.children[1].textContent.trim();
                showArchiveModal(id, clientName, row);
            });
        });
        // MODAL DE CONFIRMACIÓN DE ELIMINACIÓN
        document.addEventListener('DOMContentLoaded', function() {
            // Crear el modal dinámicamente
            const deleteModalHTML = `
        <div id="deleteModal" class="delete-modal-overlay">
            <div class="delete-modal-content">
                <div class="delete-modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="delete-modal-title">¿Confirmar eliminación?</h3>
                <p class="delete-modal-message">
                    Esta acción eliminará permanentemente la solicitud de 
                    <span class="delete-modal-client-name" id="clientName"></span>.
                    <br><br>
                    <strong>Esta acción no se puede deshacer.</strong>
                </p>
                <div class="delete-modal-buttons">
                    <button type="button" class="delete-modal-btn delete-modal-btn-cancel" id="cancelDelete">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="button" class="delete-modal-btn delete-modal-btn-confirm" id="confirmDelete">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
    `;

            // Insertar el modal en el DOM
            document.body.insertAdjacentHTML('beforeend', deleteModalHTML);

            // Referencias a elementos del modal
            const deleteModal = document.getElementById('deleteModal');
            const cancelBtn = document.getElementById('cancelDelete');
            const confirmBtn = document.getElementById('confirmDelete');
            const clientNameSpan = document.getElementById('clientName');

            let deleteUrl = '';
            let currentRow = null;

            // Función para mostrar el modal
            function showDeleteModal(url, clientName, row) {
                deleteUrl = url;
                currentRow = row;
                clientNameSpan.textContent = clientName;
                deleteModal.classList.add('show');
                document.body.style.overflow = 'hidden'; // Evitar scroll del body
            }

            // Función para ocultar el modal
            function hideDeleteModal() {
                deleteModal.classList.remove('show');
                document.body.style.overflow = ''; // Restaurar scroll del body
                deleteUrl = '';
                currentRow = null;
            }

            // Event listeners para todos los botones de eliminar
            document.querySelectorAll('.eliminar').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    const url = this.getAttribute('href');
                    const row = this.closest('.solicitud-row');
                    const clientName = row.children[1].textContent.trim();

                    showDeleteModal(url, clientName, row);
                });
            });

            // Cancelar eliminación
            cancelBtn.addEventListener('click', hideDeleteModal);

            // Confirmar eliminación
            confirmBtn.addEventListener('click', function() {
                if (deleteUrl) {
                    // Mostrar estado de carga en el botón
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
                    this.disabled = true;

                    // Hacer la petición de eliminación
                    window.location.href = deleteUrl;
                }
            });

            // Cerrar modal al hacer clic fuera del contenido
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    hideDeleteModal();
                }
            });

            // Cerrar modal con la tecla Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && deleteModal.classList.contains('show')) {
                    hideDeleteModal();
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    // --- MODAL DE ELIMINACIÓN (ya existente) ---
    const deleteModalHTML = `
        <div id="deleteModal" class="delete-modal-overlay">
            <div class="delete-modal-content">
                <div class="delete-modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="delete-modal-title">¿Confirmar eliminación?</h3>
                <p class="delete-modal-message">
                    Esta acción eliminará permanentemente la solicitud de 
                    <span class="delete-modal-client-name" id="clientName"></span>.<br><br>
                    <strong>Esta acción no se puede deshacer.</strong>
                </p>
                <div class="delete-modal-buttons">
                    <button type="button" class="delete-modal-btn delete-modal-btn-cancel" id="cancelDelete">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="button" class="delete-modal-btn delete-modal-btn-confirm" id="confirmDelete">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
        <div id="archiveModal" class="delete-modal-overlay">
            <div class="delete-modal-content">
                <div class="delete-modal-icon">
                    <i class="fas fa-archive"></i>
                </div>
                <h3 class="delete-modal-title">¿Archivar solicitud?</h3>
                <p class="delete-modal-message">
                    Esta acción archivará la solicitud de 
                    <span class="delete-modal-client-name" id="archiveClientName"></span>.<br><br>
                    Podrás consultarla en la sección de archivados.
                </p>
                <div class="delete-modal-buttons">
                    <button type="button" class="delete-modal-btn delete-modal-btn-cancel" id="cancelArchive">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="button" class="delete-modal-btn delete-modal-btn-confirm" id="confirmArchive">
                        <i class="fas fa-archive"></i> Archivar
                    </button>
                </div>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', deleteModalHTML);

    // --- ELIMINAR ---
    const deleteModal = document.getElementById('deleteModal');
    const cancelBtn = document.getElementById('cancelDelete');
    const confirmBtn = document.getElementById('confirmDelete');
    const clientNameSpan = document.getElementById('clientName');
    let deleteUrl = '';
    let currentRow = null;

    function showDeleteModal(url, clientName, row) {
        deleteUrl = url;
        currentRow = row;
        clientNameSpan.textContent = clientName;
        deleteModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function hideDeleteModal() {
        deleteModal.classList.remove('show');
        document.body.style.overflow = '';
        deleteUrl = '';
        currentRow = null;
    }
    document.querySelectorAll('.eliminar').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            const row = this.closest('.solicitud-row');
            const clientName = row.children[1].textContent.trim();
            showDeleteModal(url, clientName, row);
        });
    });
    cancelBtn.addEventListener('click', hideDeleteModal);
    confirmBtn.addEventListener('click', function() {
        if (deleteUrl) {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
            this.disabled = true;
            window.location.href = deleteUrl;
        }
    });
    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) hideDeleteModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && deleteModal.classList.contains('show')) hideDeleteModal();
    });

    // --- ARCHIVAR ---
    const archiveModal = document.getElementById('archiveModal');
    const cancelArchiveBtn = document.getElementById('cancelArchive');
    const confirmArchiveBtn = document.getElementById('confirmArchive');
    const archiveClientNameSpan = document.getElementById('archiveClientName');
    let archiveId = '';
    let archiveRow = null;

    function showArchiveModal(id, clientName, row) {
        archiveId = id;
        archiveRow = row;
        archiveClientNameSpan.textContent = clientName;
        archiveModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function hideArchiveModal() {
        archiveModal.classList.remove('show');
        document.body.style.overflow = '';
        archiveId = '';
        archiveRow = null;
    }
    document.querySelectorAll('.archivar').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const row = this.closest('.solicitud-row');
            const clientName = row.children[1].textContent.trim();
            showArchiveModal(id, clientName, row);
        });
    });
    cancelArchiveBtn.addEventListener('click', hideArchiveModal);
    confirmArchiveBtn.addEventListener('click', function() {
        if (archiveId) {
            confirmArchiveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Archivando...';
            confirmArchiveBtn.disabled = true;
            fetch(`/solicitud/archivar/${archiveId}`, { method: 'POST' })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        if (archiveRow) archiveRow.style.display = 'none';
                        hideArchiveModal();
                    } else {
                        confirmArchiveBtn.innerHTML = '<i class="fas fa-archive"></i> Archivar';
                        confirmArchiveBtn.disabled = false;
                    }
                })
                .catch(() => {
                    confirmArchiveBtn.innerHTML = '<i class="fas fa-archive"></i> Archivar';
                    confirmArchiveBtn.disabled = false;
                });
        }
    });
    archiveModal.addEventListener('click', function(e) {
        if (e.target === archiveModal) hideArchiveModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && archiveModal.classList.contains('show')) hideArchiveModal();
    });
});
    </script>

</main>