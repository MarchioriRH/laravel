@extends( 'layouts.app' )

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Usuarios</h1>
                <div class="container p-4">
                    <div class="row">

                        @if (isset($isSearch) && $isSearch)
                        <div class="col-md-6 text-center">
                            <a href="/users" class="btn btn-warning">Volver</a>
                        </div>
                        @else
                            <div class="col-md-6 text-center">                           
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchForm">Buscar</button>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="/home" class="btn btn-warning">Volver</a>
                            </div>
                        @endif
                    </div>
                </div>
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
                                <td>{{ $user->active ? 'Si' : 'No' }}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('user.search') 
            <div class="md-4">
                {{ $users->links() }}
            </div>
        </div>
@endsection
