<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <style>

    </style>

</head>

<body>
    <!-- Header -->
    <header class="header">
        <button class="hamburger">
            <img src="/img/menu.png" alt="menu">
        </button>
        <div class="search-container">
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Buscar...">
            </div>
        </div>
        <div class="cerrar-sesion">
            <a href="/login/logout">
                <img src="/img/cerrarsesion.png" alt="cerrar-sesion">
            </a>
        </div>
    </header>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <button class="sidebar-item">
            <img src="/img/IconosSidebar/houseblack.svg" alt="Logo 1">
            <span class="sidebar-text">Home</span>
        </button>
        <button class="sidebar-item">
            <a href="Solicitudes.html">
                <img src="/img/IconosSidebar/SolicitudesLine.svg" alt="Logo 2">
            </a>
            <span class="sidebar-text">Solicitudes</span>
        </button>
        <button class="sidebar-item">
            <img src="/img/IconosSidebar/AgendaLine.svg" alt="Logo 3">
            <span class="sidebar-text">Agenda</span>
        </button>
        <button class="sidebar-item">
            <a href="./Usuario.html">
                <img src="/img/IconosSidebar/perfilLine.svg" alt="Usuarios">
            </a>
            <span class="sidebar-text">Usuarios</span>
        </button>
    </div>



    <!-- Main Content -->
    <main>
        <section class="Container">
            <div class="content">
                <?php include_once $content; ?>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <p>© 2023 SENA CALDAS. Todos los derechos reservados.</p>
        <p>Sistema de Gestión de Relacionamiento Empresarial</p>
    </footer>

    <!-- JavaScript for Sidebar -->
    <script>
        const btnMenu = document.querySelector('.hamburger');
        const sidebar = document.getElementById('sidebar');
        const body = document.querySelector('body');
        const main = document.querySelector('main');

        btnMenu.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            body.classList.toggle('sidebar-open');
            if (sidebar.classList.contains('open')) {
                main.style.marginLeft = '130px'; // Mueve el contenido principal cuando el sidebar está abierto
            } else {
                main.style.marginLeft = ''; // Restaura el contenido principal cuando el sidebar está cerrado
            }
        });
    </script>
</body>

</html>