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

var canvasLine = document.getElementById('requestinprocess');
if (canvasLine) {
    fetch('/solicitud/solicitudesPorMesAPI')
        .then(response => {
            if (!response.ok) throw new Error('No se pudo obtener los datos');
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data) || data.length === 0) {
                canvasLine.parentNode.innerHTML = "<p style='text-align:center;color:#888;'>No hay datos para mostrar.</p>";
                return;
            }

            const meses = data.map(item => item.mes);
            const enProceso = data.map(item => item.en_proceso);
            const ejecutadas = data.map(item => item.ejecutadas);

            var ctxLine = canvasLine.getContext('2d');
            var lineChart = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [
                        {
                            label: 'En Proceso',
                            data: enProceso,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.1)',
                            fill: false,
                            tension: 0.3
                        },
                        {
                            label: 'Ejecutadas',
                            data: ejecutadas,
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
                        },
                        title: {
                            display: true,
                            text: 'Solicitudes En Proceso y Ejecutadas por Mes'
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
        })
        .catch(error => {
            canvasLine.parentNode.innerHTML = "<p style='text-align:center;color:#c00;'>Error cargando la gráfica.</p>";
            console.error(error);
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
if (canvasServicios) {
    fetch('/solicitud/serviciosMasSolicitadosAPI')
        .then(response => {
            if (!response.ok) throw new Error('No se pudo obtener los datos');
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data) || data.length === 0) {
                canvasServicios.parentNode.innerHTML = "<p style='text-align:center;color:#888;'>No hay datos para mostrar.</p>";
                return;
            }

            const labels = data.map(item => item.Servicio);
            const cantidades = data.map(item => parseInt(item.cantidad));
            const colors = data.map(item => item.Color || '#cccccc');

            var ctxServicios = canvasServicios.getContext('2d');
            new Chart(ctxServicios, {
                type: 'doughnut',
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
                            text: 'Servicios más Solicitados'
                        }
                    }
                }
            });
        })
        .catch(error => {
            canvasServicios.parentNode.innerHTML = "<p style='text-align:center;color:#c00;'>Error cargando la gráfica.</p>";
            console.error(error);
        });
}

// MUNICIPIOS CON MÁS SOLICITUDES
var canvasMunicipios = document.getElementById('topMunicipios');
if (canvasMunicipios) {
    function generateColors(total) {
        const colors = [];
        for(let i = 0; i < total; i++) {
            const hue = (i * 360 / total) % 360;
            colors.push(`hsla(${hue}, 70%, 60%, 0.7)`);
        }
        return colors;
    }

    // Obtener solo los municipios con solicitudes
    async function loadMunicipiosData() {
        try {
            // Obtener datos de solicitudes
            const statsResponse = await fetch('/solicitud/municipiosMasSolicitudesAPI');
            if (!statsResponse.ok) throw new Error('Error obteniendo estadísticas');
            const solicitudesData = await statsResponse.json();

            // Filtrar solo municipios con solicitudes y ordenar
            const datasetFinal = solicitudesData
                .filter(item => item.cantidad > 0)
                .sort((a, b) => b.cantidad - a.cantidad);

            return datasetFinal;

        } catch (error) {
            console.error("Error:", error);
            throw error;
        }
    }

    // Crear la gráfica con los datos
    loadMunicipiosData().then(data => {
        if (data.length === 0) {
            canvasMunicipios.parentNode.innerHTML = "<p style='text-align:center;color:#888;'>No hay solicitudes registradas en ningún municipio.</p>";
            return;
        }

        const municipiosLabels = data.map(item => item.Municipio);
        const municipiosData = data.map(item => item.cantidad);
        const municipiosColors = generateColors(data.length);

        // Ajustar alto del canvas
        canvasMunicipios.height = Math.max(300, municipiosLabels.length * 25);

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
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Solicitudes por Municipio'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: { color: '#333' }
                    },
                    y: {
                        ticks: { 
                            color: '#333',
                            callback: function(value) {
                                const label = this.getLabelForValue(value);
                                return label.length > 15 ? label.substr(0, 12) + '...' : label;
                            }
                        }
                    }
                }
            }
        });
    }).catch(error => {
        canvasMunicipios.parentNode.innerHTML = "<p style='text-align:center;color:#c00;'>Error cargando la gráfica.</p>";
        console.error(error);
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
