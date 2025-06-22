<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .hamburger-bar {
            fill: #262626;
            transition: fill 0.3s ease;
        }

        body.dark-mode .hamburger-bar {
            fill: #b0b0b0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="hamburger" title="Menú">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect y="7" width="32" height="3" rx="1.5" class="hamburger-bar" />
                    <rect y="14.5" width="32" height="3" rx="1.5" class="hamburger-bar" />
                    <rect y="22" width="32" height="3" rx="1.5" class="hamburger-bar" />
                </svg>
            </button>
        </div>
        <div class="titleSisrel">Relacionamiento Corporativo</div>
        <div class="header-actions">
            <button id="toggle-dark-mode" title="Modo oscuro" class="header-action-btn">
                <i id="dark-mode-icon" class="fa-solid fa-moon" style="color:#262626;"></i>
            </button>
            <a href="/login/init" title="Cerrar sesión" class="header-action-btn">
                <i class="fa-solid fa-arrow-right-from-bracket" style="color: #696969;"></i>
            </a>
        </div>
    </header>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="<?php
                    switch ($_SESSION['rol']) {
                        case 1:
                            echo '/usuario/indexAdministrador';
                            break;
                        case 2:
                            echo '/usuario/indexAdministrativo';
                            break;
                        case 3:
                            echo '/usuario/indexBienvenida';
                            break;
                        default:
                            echo '/usuario/indexBienvenida';
                    }
                    ?>" class="sidebar-item <?php if ($titulo == "Home" || $titulo == "Home Admin") {
                                                echo "selected";
                                            } ?>">
            <i data-lucide="home"></i>
            <span class="sidebar-text">Home</span>
        </a>
        <a href="<?php
                    switch ($_SESSION['rol']) {
                        case 1:
                            echo '/solicitud/view';
                            break;
                        case 2:
                            echo '/solicitud/solicitudEstadisticas';
                            break;
                        case 3:
                            echo '/solicitud/view';
                            break;
                        default:
                            echo '/solicitud/view';
                    }
                    ?>" class="sidebar-item <?php if ($titulo == "solicitudes" || $titulo == "Solicitudes Estadisticas") {
                                                echo "selected";
                                            } ?>">
            <i data-lucide="message-square"></i>
            <span class="sidebar-text">Solicitudes</span>
        </a>
        <a href="/solicitud/new" class="sidebar-item <?php if ($titulo == "Nueva solicitud") {
                                                        echo "selected";
                                                    } ?>">
            <i data-lucide="file-edit"></i>
            <span class="sidebar-text">Formulario</span>
        </a>
        <a href="/usuario/perfil" class="sidebar-item <?php if ($titulo == "Perfil Usuario") {
                                                            echo "selected";
                                                        } ?>">
            <i data-lucide="user-round"></i>
            <span class="sidebar-text">Usuario</span>
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
        <div style="margin-top: 10px;">
            <i class="fab fa-instagram" style="color: #B0B0B0; margin: 0 10px;"></i>
            <i class="fab fa-facebook" style="color: #B0B0B0; margin: 0 10px;"></i>
            <i class="fab fa-x-twitter" style="color: #B0B0B0; margin: 0 10px;"></i>
            <i class="fab fa-youtube" style="color: #B0B0B0; margin: 0 10px;"></i>
            <i class="fab fa-linkedin" style="color: #B0B0B0; margin: 0 10px;"></i>
        </div>
        <p style="color:#39a900; font-weight: bold; letter-spacing: 1px;">@SENAComunica</p>
        <p>Sistema de Gestión de Relacionamiento Corporativo SENA©</p>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        // Sidebar toggle
        const btnMenu = document.querySelector('.hamburger');
        const sidebar = document.getElementById('sidebar');
        const body = document.querySelector('body');
        const main = document.querySelector('main');

        btnMenu.addEventListener('click', function() {
            sidebar.classList.toggle('open');
            body.classList.toggle('sidebar-open');

            if (sidebar.classList.contains('open')) {
                main.style.marginLeft = '140px';
            } else {
                main.style.marginLeft = '';
            }
        });

        // Modo oscuro con ícono dinámico
        const darkModeBtn = document.getElementById('toggle-dark-mode');
        const darkModeIcon = document.getElementById('dark-mode-icon');

        function updateDarkModeIcon() {
            if (document.body.classList.contains('dark-mode')) {
                darkModeIcon.classList.remove('fa-moon');
                darkModeIcon.classList.add('fa-sun');
                darkModeIcon.style.color = '#facc15';
            } else {
                darkModeIcon.classList.remove('fa-sun');
                darkModeIcon.classList.add('fa-moon');
                darkModeIcon.style.color = '#262626';
            }
        }

        darkModeBtn.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');

            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', '1');
            } else {
                localStorage.removeItem('darkMode');
            }

            updateDarkModeIcon();
        });

        // Aplicar preferencia de modo oscuro al cargar
        if (localStorage.getItem('darkMode')) {
            document.body.classList.add('dark-mode');
        }
        updateDarkModeIcon();
    </script>
</body>
</html>