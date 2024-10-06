
  <!-- Modal -->
  <div class="modal fade" id="find" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('user.find') }}" method="GET" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

        </form>
    </div>
  </div>
