@extends( 'layouts.app' )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Usuarios</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#find">
                    Buscar
                </button>
                <a href="/home" class="btn btn-warning">Volver</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Activo</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->active }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <form action="{{ route('user.activate', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">
                                            {{ $user->active ? 'Desactivar' : 'Activar' }}
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                        Asignar rol
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @include('user.rol-asign')
                        @include('user.delete')
                        @include('user.find')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="md-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
