@extends( 'home' )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Clientes</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    Nuevo
                </button>
                <a href="/home" class="btn btn-warning">Volver</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $cliente->id }}">
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $cliente->id }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @include('cliente.edit')
                        @include('cliente.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('cliente.create')
        </div>
        <div class="md-4">
            {{ $clientes->links() }}
        </div>
    </div>
@endsection
