<style>
    h1 {
      font-size: 28px;
      color: #39A900;
      margin-bottom: 20px;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card .title {
      font-size: 14px;
      color: #09669C;
    }

    .card .value {
      font-size: 24px;
      font-weight: bold;
      margin-top: 5px;
    }

    .chart-container {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      h2 {
        color: #09669C;
      }
    }

    .chart-placeholder {
      background-color: #eaeaea;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #888;
      font-style: italic;
    }

    .movimientos {
      background: #fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .movimientos h2 {
      margin-bottom: 15px;
      color: #39A900;
    }

    .movimiento-header,
    .movimiento {
      display: grid;
      grid-template-columns: 1fr 2fr 3fr 2fr;
      gap: 10px;
      padding: 10px 0;
    }

    .movimiento-header {
      border-bottom: 2px solid #eee;
      color: #666;
      font-weight: bold;
    }

    .movimiento {
      border-bottom: 1px solid #f0f0f0;
      color: #444;
    }

    .movimiento:last-child {
      border-bottom: none;
    }

    .movimiento:hover {
      background-color: #f9f9f9;
    }

    @media(max-width: 768px) {
      .movimiento-header,
      .movimiento {
        grid-template-columns: 1fr;
      }
    }
</style>

<div class="container">
<h1>Estadísticas</h1>

  <div class="cards">
    <div class="card">
      <div class="title">Usuarios Registrados</div>
      <div class="value"><?php echo number_format($totalUsuarios); ?></div>
    </div>
    <div class="card">
      <div class="title">Solicitudes Pendientes</div>
      <div class="value"><?php echo number_format($totalSolicitudesPendientes); ?></div>
    </div>
    <div class="card">
      <div class="title">Solicitudes Resueltas</div>
      <div class="value"><?php echo number_format($totalSolicitudesResueltas); ?></div>
    </div>
    <div class="card">
      <div class="title">Solicitudes en proceso</div>
      <div class="value"><?php echo number_format($totalSolicitudesEnProceso); ?></div>
    </div>
  </div>

  <div class="chart-container">
    <h2>Actividad Mensual</h2>
    <div class="chart-placeholder">
        <img src="../img/resuelto.png" alt="">
    </div>
  </div>

  <div class="movimientos">
    <h2>Últimos Movimientos</h2>
    <div class="movimiento-header">
      <div>ID</div>
      <div>Usuario</div>
      <div>Acción</div>
      <div>Fecha</div>
    </div>

    <div class="movimiento">
      <div>001</div>
      <div>Juan Pérez</div>
      <div>Nueva Solicitud</div>
      <div>2025-04-08</div>
    </div>
    <div class="movimiento">
      <div>002</div>
      <div>María Gómez</div>
      <div>Nuevo Usuario</div>
      <div>2025-04-07</div>
    </div>
  </div>

</div>