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
                                    <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
                                    <a href="{{ route('cliente.destroy', $cliente->id) }}" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('cliente.create')
        </div>
    </div>
@endsection
