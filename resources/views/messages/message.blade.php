
  <!-- Modal -->
  <div class="modal fade" id="destroy{{ $cliente->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('clientes.destroy', $cliente->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                <p>¿Esta seguro de eliminar al cliente {{ $cliente->nombre }}?</p>
            </div>
        </form>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>


    </div>
  </div>
