
<!-- Modal -->
@extends( 'layouts.app' )

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form id="searchForm" mehtod="GET" >
            @csrf
            <div>  
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
  </div>
 @endsection

