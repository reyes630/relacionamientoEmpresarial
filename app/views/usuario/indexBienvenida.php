<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tarjetas Compactas - SISREL</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      /* background-color: #F0F4F8; */
      margin: 0;
      padding: 0;
      color: #04324D;
    }

    /* Modo oscuro para las cards y contenedores administrativos */
    body.dark-mode .card,
    body.dark-mode .chart-container,
    body.dark-mode .movimientos {
        background: #23272a !important;
        color: #e0e0e0;
        box-shadow: 0 2px 12px rgba(0,0,0,0.25);
    }

    body.dark-mode .card .title,
    body.dark-mode .chart-container h2,
    body.dark-mode .movimientos h2 {
        color: #39A900;
    }

    body.dark-mode .card .value {
        color: #e0e0e0;
    }

    body.dark-mode .movimiento-header {
        border-bottom: 2px solid #393e42;
        color: #b0b0b0;
        background: #23272a;
    }

    body.dark-mode .movimiento {
        border-bottom: 1px solid #393e42;
        color: #e0e0e0;
        background: #23272a;
    }

    body.dark-mode .movimiento:hover {
        background-color: #2d3238;
    }

    body.dark-mode .chart-placeholder {
        background-color: #393e42;
        color: #b0b0b0;
    }

    .data-container {
      display: flex;
      flex-direction: row;
      align-items: flex-start;
      justify-content: center;
      gap: 40px;
      padding: 40px 0;
    }

    .textWelcome {
      width: 65%;
    }

    .textWelcome h1 {
      font-size: 70px;
      color: #04324D;
      margin-bottom: 10px;
    }

    .textWelcome h4 {
      font-size: 30px;
      color: #39A900;
      font-weight: 100;
      margin-bottom: 20px;
    }

    .textWelcome p {
      font-size: 16px;
      color: #9EA19C;
      max-width: 700px;
    }

    .cards-stack {
      width: 260px;
      position: relative;
      height: 400px;
      margin-top: 70px; 

      img {
        width: 100%;
        height: auto;
        position: absolute;
        top: -100px;
        left: 0;
      }
    }

    .card-styled {
      position: absolute;
      left: 0;
      right: 0;
      margin: auto;
      width: 240px;
      height: 160px;
      background-color: white;
      border-radius: 20px;
      padding: 20px 16px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
      transition: transform 0.4s ease, box-shadow 0.3s ease;
      opacity: 0;
      transform: translateY(100px);
    }

    .card-styled .card-icon {
      background: #005a96;
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-styled .card-icon i {
      color: white;
      font-size: 18px;
    }

    .card-title {
      font-size: 16px;
      font-weight: bold;
      color: #04324D;
    }

    .card-text {
      font-size: 13px;
      color: #6c757d;
    }

    .card-styled:hover {
      transform: scale(1.05) translateY(-10px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
      z-index: 10;
    }

    .cards-stack:hover .card-styled:not(:hover) {
      opacity: 0.7;
    }

    .card-styled.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .card1 { top: 0; z-index: 3; }
    .card2 { top: 30px; z-index: 2; }
    .card3 { top: 60px; z-index: 1; }

    @media (max-width: 768px) {
      .data-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 30px 20px;
      }

      .textWelcome, .cards-stack {
        width: 100%;
      }

      .cards-stack {
        height: auto;
        margin-top: 20px;
      }

      .card-styled {
        position: static;
        margin-bottom: 15px;
        transform: translateY(20px);
      }

      .card-styled.visible {
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="data-container">
    <div class="textWelcome">
      <h1>¡¡Bienvenidos!!</h1>
      <h4>Sistema Gestión de Relacionamiento Empresarial</h4>
      <p>
        En este sitio nos especializamos en ayudarte a gestionar, fortalecer y optimizar la relación entre
        usuarios y el Servicio Nacional de Aprendizaje. Ofrecemos herramientas avanzadas para monitorear la
        presencia en medios, mejorar la interacción con el público y gestionar tu reputación en línea. Nuestro
        objetivo es que logres una comunicación efectiva y estratégica.
      </p>
    </div>

    <div class="cards-stack">
        <img src="../img/empresario.png" alt="empresario"  >
      <!-- <div style="text-align:left; font-size:1.2rem; font-weight:bold; color:#005a96; margin-bottom:50px; margin-left:4px;">
        ¿Sabías que?
      </div> -->
     <!--  <div class="card-styled card1">
        <div class="card-icon"><i class="fas fa-chart-line"></i></div>
        <div class="card-title">Análisis de Datos</div>
        <div class="card-text">Monitoreo en tiempo real del desempeño institucional.</div>
      </div>
      <div class="card-styled card2">
        <div class="card-icon"><i class="fas fa-comments"></i></div>
        <div class="card-title">Relación con Usuarios</div>
        <div class="card-text">Fortalece la comunicación y atención al usuario.</div>
      </div>
      <div class="card-styled card3">
        <div class="card-icon"><i class="fas fa-bullseye"></i></div>
        <div class="card-title">Gestión Integral</div>
        <div class="card-text">Centraliza todos tus procesos de relacionamiento en una plataforma única.</div>
      </div>
    </div>
  </div> -->

  <!-- Animación de entrada -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cards = document.querySelectorAll('.card-styled');
      cards.forEach((card, index) => {
        setTimeout(() => {
          card.classList.add('visible');
        }, 150 * index);
      });
    });
  </script>
</body>
</html>
