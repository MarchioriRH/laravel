<!DOCTYPE html>
<html>
<head>
    <title>Informe de usuarios</title>
    <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="../public/images/logo.png" alt="Logo Municipalidad de Rauch" class="img-thumbnail"  width="200" height="100">
                <span class="text-center">
                    <h1>Informe de Usuarios</h1>
                </span>
            </div>
    
            <div class="container mt-5">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Activo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->active ? 'Sí' : 'No' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/reportTargetBlank.js') }}"></script>
</body>
</html>
