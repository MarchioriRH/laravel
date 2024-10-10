// public/js/searchForm.js
document.addEventListener('DOMContentLoaded', function() {
    var dataToFindSelect = document.getElementById('dataToFind');
    var dynamicInput = document.getElementById('dynamicInput');

    dataToFindSelect.addEventListener('change', function() {
        dynamicInput.innerHTML = ''; // Limpiar el contenido anterior

        if (this.value === 'role') {
            // Crear un select para roles
            var select = document.createElement('select');
            select.name = 'data';
            select.className = 'form-select';
            select.innerHTML = `
                <option value="admin">Admin</option>
                <option value="user">Usuario</option>
                <option value="guest">Visitante</option>
            `;
            dynamicInput.appendChild(select);
        } else {
            // Crear un input de texto
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'data';
            input.className = 'form-control';
            input.placeholder = 'Ingrese el dato a buscar';
            dynamicInput.appendChild(input);
        }
    });

    // Disparar el evento change al cargar la página para establecer el campo inicial
    dataToFindSelect.dispatchEvent(new Event('change'));
});