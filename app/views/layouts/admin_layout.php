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
        <button class="hamburger">
            <img src="/img/menu.png" alt="menu">
        </button>
        <!-- <div class="search-container">
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Buscar...">
            </div>
        </div> -->
        
        <div class="cerrar-sesion">
            <a href="/login/init">
                <img src="/img/cerrarsesion.png" alt="cerrar-sesion">
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
        ?>" class="sidebar-item home">
            <img class="icon <?php if($titulo == "Home" || $titulo == "Home Admin" || $titulo== "Estadisticas"){echo "selected";} ?>" src="/img/IconosSidebar/houseLine.svg" alt="Logo 1">
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
        ?>" class="sidebar-item solicitudes">
            <img class="icon <?php if($titulo == "solicitudes" || $titulo == "Solicitudes Estadisticas"){echo "selected";} ?>" src="/img/IconosSidebar/SolicitudesLine.svg" alt="Logo 2">
            <span class="sidebar-text">Solicitudes</span>
        </a>
        <a href="/solicitud/new" class="sidebar-item formulario">
            <img class="icon <?php if($titulo == "Nueva solicitud"){echo "selected";} ?>" src="/img/IconosSidebar/formularioLine.svg" alt="Formulario">
            <span class="sidebar-text">Formulario</span>
        </a>
        <a href="/usuario/perfil" class="sidebar-item perfil">
            <img class="icon <?php if($titulo == "Perfil Usuario"){echo "selected";} ?>" src="/img/IconosSidebar/perfilLine.svg" alt="Perfil">
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
               
                main.style.marginLeft = '140px'; // Mueve el contenido principal cuando el sidebar está abierto
            } else {
                main.style.marginLeft = ''; // Restaura el contenido principal cuando el sidebar está cerrado
            }
        });

        let icons = document.querySelectorAll('.icon')
        let arrayImges = [
            "houseblack.svg",
            "solicitudesBlack.svg",
            "formularioBlack.svg", 
            "perfilBlack.svg"
        ]

        for (let i = 0; i < icons.length; i++) {
            if (icons[i].classList.contains("selected")) {
                icons[i].src = "/img/IconosSidebar/" + arrayImges[i]
            }
        }
    </script>
</body>

</html>