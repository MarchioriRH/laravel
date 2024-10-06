{{--

    This Blade template extends the 'layouts.app' layout and defines the content section.
    It includes a container with two buttons: one for navigating to the 'Clientes' page
    and another for navigating to the 'Usuarios' page, which is only visible to users
    with the 'admin' role. The content section is yielded at the end.
--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <a href="/clientes" class="btn btn-primary">Clientes</a>
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="col-md-6 text-center">
                    <a href="/users" class="btn btn-primary">Usuarios</a>
                </div>
            @endif
        </div>
    </div>
    {{-- @yield('content') --}}
@endsection
