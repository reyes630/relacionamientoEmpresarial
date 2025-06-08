
<style> 
    .dashboard-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
  padding: 20px;
  background: #f5f5f5;
}

.dashboard-cards {
  display: grid;
  grid-template-areas:
    "left right"
    "left right";
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  padding: 20px;
  background: #f5f5f5;
  height: 100vh; /* Opcional: ajusta a tu gusto */
}

.card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  padding: 15px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card:nth-child(1) {
  grid-area: top-left;
}

.card:nth-child(2) {
  grid-area: bottom-left;
}

.card:nth-child(3) {
  grid-area: right;
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
  <div class="card-text">
    <p class="title">Solicitudes Mensuales</p>
    <div class="meses">
      <div>
        <p>Enero</p>
        <p class="numero">400</p>
      </div>
      <div>
        <p>Febrero</p>
        <p class="numero">50</p>
      </div>
    </div>
  </div>
  <img src="../img/dona.png" alt="Gráfico de dona" class="card-image" />
</div>

  
    <!-- Ficha: Barras estadísticas -->
    <div class="card">
      <p class="title">Barras estadísticas</p>
      <img src="../img/progresosEstados.png" alt="Barras estadísticas" class="card-image" />
    </div>
  <!-- Ficha: Trimestre 1 -->
  <div class="card">
    <div class="card-text">
      <p class="title">Trimestre 1</p>
      <ul class="leyenda">
        <li><span class="dot dot-verde"></span> En Proceso (100)</li>
        <li><span class="dot dot-celeste"></span> Ejecutados (50)</li>
        <li><span class="dot dot-gris"></span> Asignados (35)</li>
      </ul>
    </div>
    <img src="../img/radar.png" alt="Gráfico circular" class="card-image" />
  </div>
</section>
