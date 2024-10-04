
  <!-- Modal -->
  <div class="modal fade" id="find" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('users.find', $cliente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <label for="find">Buscar</label>
                <select class="form-select" name="find" aria-label="Seleccionar rol">
                    <option @if ($user->role === 'admin') selected @endif value="admin">Admin</option>
                    <option @if ($user->role === 'user') selected @endif value="user">Usuario</option>
                    <option @if ($user->role === 'guest') selected @endif value="guest">Visitante</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>
  </div>
