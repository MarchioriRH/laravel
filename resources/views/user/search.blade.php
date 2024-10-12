
<!-- Modal -->
<div class="modal fade" id="searchForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Buscar usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="searchForm" action="{{ route('user.search') }}" mehtod="GET" >
            @csrf
            <div>
                <label for="" class="form-label">Buscar</label>
                <select class="form-select" name="dataToFind" id="dataToFind" aria-label="Seleccionar tipo de busqueda">
                    <option value="id">id</option>
                    <option value="name">Nombre</option>
                    <option value="email">Email</option>
                    <option value="role">Rol</option>
                    <option value="active">Estado</option>
                </select>
                <div class="mb-3" id="dynamicInput">
                  <!-- Campo de entrada dinámico -->
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-primary" id="searchButton">Buscar</a>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/searchForm.js') }}"></script>
