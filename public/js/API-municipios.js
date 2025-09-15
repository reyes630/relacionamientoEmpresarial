// API-municipios.js

// Cargar municipios desde la API de Colombia
async function loadMunicipios() {
    const select = document.getElementById('municipality');
    if (!select) return;

    select.innerHTML = '<option value="">Cargando municipios...</option>';

    try {
        const response = await fetch('https://api-colombia.com/api/v1/Department/8/cities');
        const municipios = await response.json();

        // Limpiar y agregar opciones
        select.innerHTML = '<option value="">Selecciona una opción</option>';
        municipios.forEach(m => {
            const option = document.createElement('option');
            option.value = m.name;   // Valor que se enviará a la BD
            option.textContent = m.name; // Texto visible
            select.appendChild(option);
        });
    } catch (error) {
        console.error("Error cargando municipios:", error);
        select.innerHTML = '<option value="">Error al cargar municipios</option>';
    }
}

// Ejecutar al cargar la página
document.addEventListener("DOMContentLoaded", loadMunicipios);
