/* ESTADISTICAS PARA ADMINISTRADOR */

/* EJEMPLO  # SOLICITUD POR MES*/
var canvas = document.getElementById('myChart');
// Solo crea la gráfica si el canvas existe en la página
if (canvas) {
    var ctx = canvas.getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: '# de Solicitudes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54,162,235,1)',
                    'rgba(255,206,86,1)',
                    'rgba(75,192,192,1)',
                    'rgba(153,102,255,1)',
                    'rgba(255,159,64,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

/* SOLICITUDES EN PROCESO /EJECUTADAS */

// Simulación de datos por mes (reemplaza estos datos por los reales desde tu backend si lo deseas)
const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'];
const solicitudesEnProceso = [5, 8, 6, 7, 4, 9];   // Cantidad por mes (estado 5)
const solicitudesEjecutadas = [2, 4, 5, 3, 6, 7];  // Cantidad por mes (estado 6)

var canvasLine = document.getElementById('requestinprocess');
// Solo crea la gráfica si el canvas existe en la página
if (canvasLine) {
    var ctxLine = canvasLine.getContext('2d');
    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: meses,
            datasets: [
                {
                    label: 'En Proceso',
                    data: solicitudesEnProceso,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.1)',
                    fill: false,
                    tension: 0.3
                },
                {
                    label: 'Ejecutadas',
                    data: solicitudesEjecutadas,
                    borderColor: 'rgba(39, 169, 0, 1)',
                    backgroundColor: 'rgba(39, 169, 0, 0.1)',
                    fill: false,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#333'
                    }
                }
            },
            scales: {
                x: {
                    ticks: { color: '#333' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#333' }
                }
            }
        }
    });
}

/* SERVICIOS MÁS PEDIDOS - Pie/Doughnut Chart */
const serviciosLabels = [
    'Tecnólogo',
    'Técnico',
    'Cursos Cortos',
    'Sennova',
    'Emprendimiento'
];

// Simulación de cantidades por servicio (ajusta según tus datos reales)
const serviciosData = [25, 40, 15, 10, 20];

const serviciosColors = [
    'rgba(54, 162, 235, 0.7)',
    'rgba(39, 169, 0, 0.7)',
    'rgba(255, 206, 86, 0.7)',
    'rgba(153, 102, 255, 0.7)',
    'rgba(255, 99, 132, 0.7)'
];

var canvasServicios = document.getElementById('serviciospedidos');
// Solo crea la gráfica si el canvas existe en la página
if (canvasServicios) {
    var ctxServicios = canvasServicios.getContext('2d');
    var serviciosChart = new Chart(ctxServicios, {
        type: 'doughnut',
        data: {
            labels: serviciosLabels,
            datasets: [{
                data: serviciosData,
                backgroundColor: serviciosColors,
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#333'
                    }
                },
                title: {
                    display: true,
                    text: 'Most Requested Services'
                }
            }
        }
    });
}

// MUNICIPIOS CON MÁS DE 10 SOLICITUDES (solo 5 municipios de Caldas, ejemplo)
const municipiosLabels = [
    'Manizales',
    'Chinchiná',
    'La Dorada',
    'Riosucio',
    'Villamaría'
];

const municipiosData = [32, 25, 18, 15, 12]; // Ejemplo de cantidades

const municipiosColors = [
    'rgba(54, 162, 235, 0.7)',
    'rgba(255, 206, 86, 0.7)',
    'rgba(39, 169, 0, 0.7)',
    'rgba(255, 99, 132, 0.7)',
    'rgba(153, 102, 255, 0.7)'
];

var canvasMunicipios = document.getElementById('topMunicipios');
// Solo crea la gráfica si el canvas existe en la página
if (canvasMunicipios) {
    var ctxMunicipios = canvasMunicipios.getContext('2d');
    var municipiosChart = new Chart(ctxMunicipios, {
        type: 'bar',
        data: {
            labels: municipiosLabels,
            datasets: [{
                label: 'Solicitudes',
                data: municipiosData,
                backgroundColor: municipiosColors,
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            indexAxis: 'y', // Barras horizontales
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Municipios con más de 10 solicitudes'
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { color: '#333' }
                },
                y: {
                    ticks: { color: '#333' }
                }
            }
        }
    });
}

// Estadística: Solicitudes por Estado (Gráfica de Torta/Pie Chart)

// Nombres de los estados 
const estadosLabels = [
    'Pendiente',
    'Resuelto',
    'En proceso',
    'Ejecutado',
    'Asignado',
    'Cerrado'
];

// Simulación de cantidades por estado (ajusta según tus datos reales)
const estadosData = [12, 8, 15, 10, 7, 5];

const estadosColors = [
    'rgba(255, 206, 86, 0.7)',   // Pendiente
    'rgba(39, 169, 0, 0.7)',     // Resuelto
    'rgba(54, 162, 235, 0.7)',   // En proceso
    'rgba(153, 102, 255, 0.7)',  // Ejecutado
    'rgba(255, 99, 132, 0.7)',   // Asignado
    'rgba(100, 100, 100, 0.7)'   // Cerrado
];

var canvasEstados = document.getElementById('solicitudesPorEstado');
if (canvasEstados) {
    fetch('/solicitud/solicitudesPorEstadoAPI') // Ajusta la ruta si tu framework usa otra
        .then(response => {
            if (!response.ok) throw new Error('No se pudo obtener los datos');
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data) || data.length === 0) {
                // Si no hay datos, muestra un mensaje o una gráfica vacía
                canvasEstados.parentNode.innerHTML = "<p style='text-align:center;color:#888;'>No hay datos para mostrar.</p>";
                return;
            }
            const labels = data.map(item => item.Estado);
            const cantidades = data.map(item => parseInt(item.cantidad));
            const colors = data.map(item => item.Color || '#ccc');

            var ctxEstados = canvasEstados.getContext('2d');
            new Chart(ctxEstados, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: cantidades,
                        backgroundColor: colors,
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#333'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Solicitudes por Estado'
                        }
                    }
                }
            });
        })
        .catch(error => {
            canvasEstados.parentNode.innerHTML = "<p style='text-align:center;color:#c00;'>Error cargando la gráfica.</p>";
            console.error(error);
        });
}
