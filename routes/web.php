<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;

use App\Http\Kernel;

use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', RoleMiddleware::class . ':' . User::ROLE_ADMIN . ',' . User::ROLE_USER])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('home', HomeController::class);

    Route::resource('clientes', ClienteController::class);
    Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::get('/clientes/show', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::get('/clientes/update', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/clientes/destroy', [ClienteController::class, 'destroy'])->name('cliente.destroy');
});

Route::middleware(['auth', RoleMiddleware::class . ':' . User::ROLE_ADMIN])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/users/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/users/activate/{id}', [UserController::class, 'activate'])->name('users.activate');
    Route::get('/users/find', [UserController::class, 'find'])->name('user.find');
});

Route::get('/wait-for-activation', function () {
    return view('auth.wait-for-activation');
})->name('waitForActivation');
