<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\Usuario\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Empresas
Route::get('/empresa/registrar', [EmpresaController::class, 'showRegistrationForm'])->name('empresa.registrar');
Route::post('/empresa/registrar', [EmpresaController::class, 'register']);
Route::get('/empresa/login', [EmpresaController::class, 'showLoginForm'])->name('empresa.login');
Route::post('/empresa/login', [EmpresaController::class, 'login']);
Route::post('/empresa/logout', [EmpresaController::class, 'logout'])->name('empresa.logout');

// Rotas protegidas para Empresas
Route::middleware('auth:empresa')->group(function () {
    Route::get('/empresa/dashboard', [EmpresaController::class, 'dashboard'])->name('empresa.dashboard');
});

// Rotas para Usuários
Route::get('/usuario/registrar', [UsuarioController::class, 'showRegistrationForm'])->name('usuario.registrar');
Route::post('/usuario/registrar', [UsuarioController::class, 'register']);
Route::get('/usuario/login', [UsuarioController::class, 'showLoginForm'])->name('usuario.login');
Route::post('/usuario/login', [UsuarioController::class, 'login']);
Route::post('/usuario/logout', [UsuarioController::class, 'logout'])->name('usuario.logout');
//Route::get('/usuario/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');


// Rotas protegidas para Usuários
Route::middleware('auth:usuario')->group(function () {
    Route::get('/usuario/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');
});




