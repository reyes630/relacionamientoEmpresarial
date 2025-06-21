<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>

    </style>

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <!-- Cambia el botón del menú hamburguesa por este SVG en línea, color negro -->
            <button class="hamburger" title="Menú">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect y="7" width="32" height="3" rx="1.5" fill="#262626"/>
                    <rect y="14.5" width="32" height="3" rx="1.5" fill="#262626"/>
                    <rect y="22" width="32" height="3" rx="1.5" fill="#262626"/>
                </svg>
            </button>            
                <!-- <div class="logotype">
                    <img src="../img/IconSisrel.png" alt="">
                </div> -->
        </div>
        <div class="titleSisrel">Relacionamiento Corporativo</div>
        <div class="header-actions">
            <button id="toggle-dark-mode" title="Modo oscuro" class="header-action-btn">
                <i class="fa-solid fa-moon" style="color:#262626;"></i>
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
        ?>" class="sidebar-item <?php if($titulo == "Home" || $titulo == "Home Admin"){echo "selected";} ?>">
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
        ?>" class="sidebar-item solicitudes <?php if($titulo == "solicitudes" || $titulo == "Solicitudes Estadisticas"){echo "selected";} ?>">
            <i data-lucide="message-square" ></i>
            <span class="sidebar-text">Solicitudes</span>
        </a>
        <a href="/solicitud/new" class="sidebar-item formulario <?php if($titulo == "Nueva solicitud"){echo "selected";} ?>">
            <i data-lucide="file-edit" ></i>
            <span class="sidebar-text">Formulario</span>
        </a>
        <a href="/usuario/perfil" class="sidebar-item perfil <?php if($titulo == "Perfil Usuario"){echo "selected";} ?>">
            <i data-lucide="user-round"> </i>
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
   <footer class="site-footer" style="text-align: center; padding: 20px;">
    <div style="margin-top: 10px;">
        <i class="fab fa-instagram" style="color: #B0B0B0; margin: 0 10px;"></i>
        <i class="fab fa-facebook" style="color: #B0B0B0; margin: 0 10px;"></i>
        <i class="fab fa-x-twitter" style="color: #B0B0B0; margin: 0 10px;"></i>
        <i class="fab fa-youtube" style="color: #B0B0B0; margin: 0 10px;"></i>
        <i class="fab fa-linkedin" style="color: #B0B0B0; margin: 0 10px;"></i>
    </div>
    <p style="color:#39a900;  font-weight: bold;  letter-spacing: 1px; ">@SENAComunica</p>
    <p>Sistema de Gestión de Relacionamiento Corporativo SENA©</p>
    
</footer>
    <!-- Script para lucide Libreria de iconos-->
     <script src="https://unpkg.com/lucide@latest"></script>
     <script>
        lucide.createIcons();
     </script>

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
               
                main.style.marginLeft = '140px'; // Mueve el contenido principal cuando el sidebar está abierto
            } else {
                main.style.marginLeft = ''; // Restaura el contenido principal cuando el sidebar está cerrado
            }
        });

      
       const darkModeBtn = document.getElementById('toggle-dark-mode');
       darkModeBtn.addEventListener('click', function() {
           document.body.classList.toggle('dark-mode');
           // Guardar preferencia en localStorage
           if(document.body.classList.contains('dark-mode')) {
               localStorage.setItem('darkMode', '1');
           } else {
               localStorage.removeItem('darkMode');
           }
       });
       // Al cargar, aplicar preferencia si existe
       if(localStorage.getItem('darkMode')) {
           document.body.classList.add('dark-mode');
       }
    </script>
    
</body>

</html>