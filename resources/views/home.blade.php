


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')


    @section('content')
    <div class="md-4 text-center">
        <a href="/clientes" class="btn btn-primary">Clientes</a>
    </div>
        @yield('content')
    @endsection
</body>
</html>
