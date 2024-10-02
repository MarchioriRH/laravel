<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('home', HomeController::class);
// Route::get('/home/create', [homeController::class, 'create'])->name('home.create');
// Route::get('/home/show', [homeController::class, 'show'])->name('home.show');
// Route::get('/home/edit', [homeController::class, 'edit'])->name('home.edit');
// Route::get('/home/update', [homeController::class, 'update'])->name('home.update');
// Route::get('/home/destroy', [homeController::class, 'destroy'])->name('home.destroy');


Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::resource('clientes', ClienteController::class);
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/clientes/show', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::get('/clientes/update', [ClienteController::class, 'update'])->name('cliente.update');
Route::get('/clientes/destroy', [ClienteController::class, 'destroy'])->name('cliente.destroy');


