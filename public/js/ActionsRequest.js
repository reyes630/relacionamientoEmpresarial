document.addEventListener('DOMContentLoaded', () => {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        const menu = toggle.nextElementSibling;

        toggle.addEventListener('click', (e) => {
            e.stopPropagation();

            // Ocultar otros dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) m.style.display = 'none';
            });

            const rect = toggle.getBoundingClientRect();
            const menuHeight = menu.offsetHeight;
            const spaceBelow = window.innerHeight - rect.bottom;
            const spaceAbove = rect.top;

            // Mostrar arriba o abajo según el espacio
            if (spaceBelow < menuHeight && spaceAbove > menuHeight) {
                menu.style.top = `${rect.top - menuHeight}px`;
            } else {
                menu.style.top = `${rect.bottom}px`;
            }
            menu.style.left = `${rect.left}px`;

            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Cerrar menú al hacer clic fuera
    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
    });
});
