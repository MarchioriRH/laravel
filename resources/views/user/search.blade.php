
  <!-- Modal -->
  <div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="searchForm" >
            @csrf
            <div class="modal-body">
                <label for="" class="form-label">Buscar</label>
                <select class="form-select" name="dataToFind" aria-label="Seleccionar tipo de busqueda">
                    <option value="id">id</option>
                    <option value="name">Nombre</option>
                    <option value="email">Email</option>
                    <option value="role">Rol</option>
                    <option value="active">Activo</option>
                    <option value="inactive">Inactivo</option>
                </select>
                <div class="mb-3">
                    <label for="" class="form-label">Dato</label>
                    <input
                        type="text"
                        class="form-control"
                        name="data"
                        id=""
                        aria-describedby="helpId"
                        placeholder="Ingrese el dato a buscar"
                    />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="searchButton">Buscar</a>
            </div>

        </form>
    </div>
  </div>
  <script>
    document.getElementById('searchButton').addEventListener('click', function() {
        // Obtener los valores del formulario
        var dataToFind = document.querySelector('select[name="dataToFind"]').value;
        var data = document.querySelector('input[name="data"]').value;

        // Construir la URL
        var url = '/users/search?dataToFind=' + encodeURIComponent(dataToFind) + '&data=' + encodeURIComponent(data);

        // Redirigir a la URL
        window.location.href = url;
    });
</script>
