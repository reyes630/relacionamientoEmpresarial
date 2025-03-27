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
        <a href="/home" class="sidebar-item">
            <img src="/img/IconosSidebar/houseblack.svg" alt="Logo 1">
            <span class="sidebar-text">Home</span>
        </a>

        <a href="/solicitud/view" class="sidebar-item">
            <img src="/img/IconosSidebar/SolicitudesLine.svg" alt="Solicitudes">
            <span class="sidebar-text">Solicitudes</span>
        </a>

        <a href="#" class="sidebar-item">
            <img src="/img/IconosSidebar/AgendaLine.svg" alt="Logo 3">
            <span class="sidebar-text">Agenda</span>
        </a>

        <a href="/solicitud/new" class="sidebar-item">
            <img src="/img/IconosSidebar/formularioLine.png" alt="Formulario">
            <span class="sidebar-text">Formulario</span>
        </a>

        <a href="/usuario/view" class="sidebar-item">
            <img src="/img/IconosSidebar/perfilLine.svg" alt="Usuarios">
            <span class="sidebar-text">Usuarios</span>
        </a>
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
        document.addEventListener('DOMContentLoaded', function() {
            const btnMenu = document.querySelector('.hamburger');
            const sidebar = document.getElementById('sidebar');
            const main = document.querySelector('main');
            const sidebarItems = document.querySelectorAll('.sidebar-item');

            // Sidebar toggle functionality
            btnMenu.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                main.classList.toggle('sidebar-open');
            });

            // Close sidebar in mobile view when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 &&
                    !sidebar.contains(e.target) &&
                    !btnMenu.contains(e.target)) {
                    sidebar.classList.remove('open');
                    main.classList.remove('sidebar-open');
                }
            });

            // Add hover effects to sidebar items
            sidebarItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    if (!sidebar.classList.contains('open')) {
                        this.style.width = '100%';
                    }
                });

                item.addEventListener('mouseleave', function() {
                    if (!sidebar.classList.contains('open')) {
                        this.style.width = '50px';
                    }
                });
            });
        });
    </script>
</body>

</html>