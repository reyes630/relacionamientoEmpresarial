document.addEventListener('DOMContentLoaded', () => {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        const menu = toggle.nextElementSibling;
        const container = toggle.closest('.action-dropdown');
        const table = container.closest('.table');

        toggle.addEventListener('click', (e) => {
            e.stopPropagation();

            // Ocultar otros dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) m.style.display = 'none';
            });

            // Mostrar menú para medirlo 
            menu.style.display = 'block';
            menu.style.position = 'fixed'; // Cambia a fixed para que no se corte
            menu.style.top = '';
            menu.style.left = '';
            menu.style.right = '';
            menu.style.bottom = '';

            // Obtener posición absoluta del botón
            const btnRect = toggle.getBoundingClientRect();
            const menuRect = menu.getBoundingClientRect();
            const tableRect = table.getBoundingClientRect();
            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight;

            // Por defecto: a la derecha del botón
            let top = btnRect.top;
            let left = btnRect.right + 4;

            // Si no cabe a la derecha, mostrar a la izquierda
            if (left + menuRect.width > tableRect.right && btnRect.left - menuRect.width > tableRect.left) {
                left = btnRect.left - menuRect.width - 4;
            }

            // Si no cabe abajo, mostrar arriba
            if (top + menuRect.height > tableRect.bottom && btnRect.bottom - menuRect.height > tableRect.top) {
                top = btnRect.bottom - menuRect.height;
            }

            // Ajustar si se sale del viewport por la derecha
            if (left + menuRect.width > viewportWidth) {
                left = viewportWidth - menuRect.width - 8;
            }
            // Ajustar si se sale por la izquierda
            if (left < 0) left = 8;

            // Ajustar si se sale por abajo del viewport
            if (top + menuRect.height > viewportHeight) {
                top = viewportHeight - menuRect.height - 8;
            }
            // Ajustar si se sale por arriba
            if (top < 0) top = 8;

            menu.style.left = `${left}px`;
            menu.style.top = `${top}px`;
        });
    });

    // Cerrar menú al hacer clic fuera
    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
    });

    // Cerrar menú al hacer scroll
    document.addEventListener('scroll', () => {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
    }, true);
});
