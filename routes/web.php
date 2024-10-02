<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', ClienteController::class);
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/clientes/show', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::get('/clientes/update', [ClienteController::class, 'update'])->name('cliente.update');
Route::get('/clientes/destroy', [ClienteController::class, 'destroy'])->name('cliente.destroy');


