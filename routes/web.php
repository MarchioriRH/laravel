<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Models\User;

use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', RoleMiddleware::class . ':' . User::ROLE_ADMIN . ',' . User::ROLE_USER])->group(function () {
    Route::resource('home', HomeController::class);
    Route::resource('clientes', ClienteController::class);
});

Route::middleware(['auth', RoleMiddleware::class . ':' . User::ROLE_ADMIN])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::patch('/activate/{id}', [UserController::class, 'activate'])->name('user.activate');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/reports/users/{users}', [ReportController::class, 'generatePDF'])->name('reports.users');
    //Route::get('/reports/users/excel', [ReportController::class, 'exportExcel'])->name('reports.users.excel');
});

Route::get('/wait-for-activation', function () {
    return view('auth.wait-for-activation');
})->name('waitForActivation');
