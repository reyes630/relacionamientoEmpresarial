<style> 
.dashboard-cards {
  display: grid;
  grid-template-areas:
    "left right"
    "left right";
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  padding: 20px;
  height: 100vh; 
}

.card {
  background: #f9f9f9; /* Fondo claro por defecto */
  color: #23272a;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.08);
  padding: 15px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

/* Modo oscuro: fondo oscuro y texto claro */
body.dark-mode .card {
  background: #23272a !important;
  color: #e0e0e0;
  box-shadow: 0 4px 8px rgba(0,0,0,0.18);
}

.card:nth-child(1) {
  grid-area: top-left;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card:nth-child(2) {
  grid-area: bottom-left;
}

.card:nth-child(3) {
  grid-area: right;
  display: flex;
  justify-content: center;
  align-items: center;
}

.dashboard-cards {
  grid-template-areas:
    "top-left right"
    "bottom-left right";
}


.title {
  font-weight: bold;
  font-size: 1.1rem;
  margin-bottom: 10px;
}

.meses {
  display: flex;
  justify-content: space-between;
}

.meses p {
  margin: 0;
}

.numero {
  font-size: 1.4rem;
  font-weight: bold;
}

.card-image {
  width: 100%;
  max-height: 200px;
  object-fit: contain;
}

.leyenda {
  list-style: none;
  padding: 0;
  margin: 0;
}

.leyenda li {
  font-size: 0.9rem;
  margin-bottom: 5px;
  display: flex;
  align-items: center;
}

.dot {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 8px;
}

.dot-verde { background-color: #0c6b58; }
.dot-celeste { background-color: #7ccbe4; }
.dot-gris { background-color: #c3c3c3; }

</style>
<section class="dashboard-cards">
  <!-- Ficha: Solicitudes Mensuales -->
 <div class="card solicitudes">
   <canvas id="serviciospedidos" width="600px" height="300px"></canvas>
</div>
    <!-- Ficha: Barras estadísticas -->
    <div class="card">
      <canvas id="topMunicipios" width="500px" height="200px"></canvas>
      </div>

  <div class="card">
     <canvas id="solicitudesPorEstado" width="500px" height="500px"></canvas>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
