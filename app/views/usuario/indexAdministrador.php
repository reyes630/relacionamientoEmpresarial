<style>
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 200px;
      height: 120px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    a {
      text-decoration: none;
    }


    .title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #39A900;
    }

    .info {
      font-size: 14px;
      color: #777;
    }

    /* Estilos para el dashboard de métricas */
    .dashboard-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, auto);
      gap: 20px;
      margin-top: 10px;
      padding: 20px;
    }

    .metric-card {
      background: #fff;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 200px;
    }

    .metric-card * {
      margin: 0;
      padding: 0;
      border: none;
      box-shadow: none;
    }

    .metric-card:nth-child(1) {
      grid-column: span 2;
    }

    .metric-card img {
      width: 100%;
      max-width: 250px;
      height: auto;
      object-fit: contain;
    }

    .metric-label {
      font-size: 1.2rem;
      font-weight: bold;
      color: #333;
    }

    .metric-value {
      font-size: 20px;
      font-weight: bold;
      color: green;
    }

    .chart-container {
      background: white;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Ajustes en la presentación de los íconos y demás */
    .img {
      width: 100%;
      max-width: 300px;
      height: auto;
      max-height: 150px;
      object-fit: contain;
    }

    @media screen and (max-width: 1024px) {
      .container {
        justify-content: center;
        gap: 16px;
      }

      .card {
        width: 180px;
        height: 150px;
        padding: 16px;
      }

      .dashboard-container {
        grid-template-columns: repeat(2, 1fr);
      }

      .metric-card {
        min-height: 160px;
        padding: 16px;
      }

      .img {
        max-width: 200px;
        max-height: 120px;
      }
    }

    @media screen and (max-width: 600px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .card {
        width: 300px;
        height: 120px;
      }

      .dashboard-container {
        grid-template-columns: 1fr;
      }

      .metric-card {
        min-height: 140px;
        padding: 12px;
      }

      .img {
        max-width: 100%;
        max-height: 100px;
      }
    }

    /* Modo oscuro para las cards del administrador */
body.dark-mode .card,
body.dark-mode .metric-card,
body.dark-mode .chart-container {
    background-color: #23272a !important;
    color: #e0e0e0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);
}

body.dark-mode .title {
    color: #39A900;
}

body.dark-mode .info,
body.dark-mode .metric-label {
    color: #b0b0b0;
}

body.dark-mode .metric-value {
    color: #39A900;
}

body.dark-mode .img {
    filter: brightness(0.92) contrast(1.05);
}
  </style>
 

  <div class="container">
    <!-- Card Usuarios -->
    <a href='<?php echo '/usuario/view' ?>'>
      <div class="card">
        <div class="icon">
          <img src="../img/IconosCardsAdmin/Usuarios.svg" alt="">
        </div>
        <div class="title">Usuarios</div>
        <div class="info">Gestión de usuarios del sistema</div>
      </div>
    </a>


    <!-- Card Roles -->
    <a href='<?php echo '/rol/view' ?>'>
      <div class="card">
        <div class="icon">
          <!-- Icono de roles -->
          <img src="../img/IconosCardsAdmin/Roles.svg" alt="">
        </div>
        <div class="title">Roles</div>
        <div class="info">Control de Crud de Roles</div>
      </div>
    </a>
    <!-- Card Tipo Evento -->
    <a href='<?php echo '/tipoEvento/view' ?>'>
      <div class="card">
        <div class="icon">
          <img src="../img/IconosCardsAdmin/TipoEvento.svg" alt="">
        </div>
        <div class="title">Tipo Evento</div>
        <div class="info">Análisis Crud Tipo de Evento</div>
      </div>
    </a>

    <!-- Card Servicios -->
    <a href='<?php echo '/servicio/view' ?>'>
      <div class="card">
        <div class="icon">
          <img src="../img/IconosCardsAdmin/Servicio.svg" alt="">
        </div>
        <div class="title">Servicios</div>
        <div class="info">Gestión De Tipo de Servicio y Servicios</div>
      </div>
    </a>
    <!-- Card Tipo Servicios -->
    <a href='<?php echo '/tipoServicio/view' ?>'>
      <div class="card">
        <div class="icon">
          <img src="../img/IconosCardsAdmin/tipoServicios.svg" alt="">
        </div>
        <div class="title"> Tipo Servicios</div>
        <div class="info">Gestión De Tipo de Servicio </div>
      </div>
    </a>

    <!-- Card Estados -->
    <a href='<?php echo '/estado/view' ?>'>
      <div class="card">
        <div class="icon">
          <!-- Icono de estados -->
          <img src="../img/IconosCardsAdmin/Estados.svg" alt="">
        </div>
        <div class="title">Estados</div>
        <div class="info">Gestión de estados</div>
      </div>
    </a>

  </div>
  <section>
    <main class="dashboard-container">
      <div class="metric-card">
        <canvas id="myChart"  width="400px" height="90px"></canvas>
      </div>
      <div class="metric-card">
        <canvas id="requestinprocess" width="200px" height="90px"></canvas>
      </div>
      <div class="metric-card">
        <canvas id="serviciospedidos" width="400px" height="200px"></canvas>
      </div>
      <div class="metric-card">
        <canvas id="topMunicipios" width="300px" height="200px"></canvas>
      </div>
      <div class="metric-card">
        <canvas id="solicitudesPorEstado" width="300px" height="200px"></canvas>
      </div>
    </main>
  </section>