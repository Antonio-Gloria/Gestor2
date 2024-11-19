<?php

use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Usuarios
Route::middleware(['auth', 'can:users.create'])->group(function () {
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});
Route::resource('/users', UserController::class)->middleware('auth')->except(['show']);
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('users/{id}', function ($id) {
    return redirect()->route('users.index')->with('error', 'La acción no está permitida.');
})->where('id', '[0-9]+');
// Servicios
Route::get('/servicios/create', [ServicioController::class, 'create'])->name('servicios.create');
Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
Route::resource('/servicios', ServicioController::class)->except(['create', 'store', 'show'])->middleware('auth');
Route::get('servicios/{id}', function ($id) {
    return redirect()->route('servicios.index')->with('error', 'La acción no está permitida.');
})->where('id', '[0-9]+');
// Tipos de Servicios
Route::resource('tiposervicios', App\Http\Controllers\TipoServicioController::class)->except('show')->middleware('auth');
Route::get('delete-tiposervicio/{tiposervicio_id}', [App\Http\Controllers\TipoServicioController::class, 'delete_tiposervicio'])->name('delete-tiposervicio')->middleware('auth');
Route::get('tiposervicios/{id}', function ($id) {
    return redirect()->route('tiposervicios.index')->with('error', 'La acción no está permitida.');
})->where('id', '[0-9]+');

// Técnicos
Route::resource('/tecnicos', App\Http\Controllers\TecnicoController::class)->except('show')->middleware('auth');
Route::get('delete-tecnico/{tecnico_id}', [App\Http\Controllers\TecnicoController::class, 'delete_tecnico'])->name('delete-tecnico')->middleware('auth');
Route::get('tecnicos/{id}', function ($id) {
    return redirect()->route('tecnicos.index')->with('error', 'La acción no está permitida.');
})->where('id', '[0-9]+');
// Servicios personalizados
Route::get('realizado-servicio/{servicio_id}', [ServicioController::class, 'realizado_servicio'])->name('realizado-servicio')->middleware('auth');
Route::get('delete-servicio/{servicio_id}', [ServicioController::class, 'delete_servicio'])->name('delete-servicio')->middleware('auth');
Route::get('/servicio/realizado', [ServicioController::class, 'realizado'])->name('servicios.realizado')->middleware('auth');
Route::get('/info-servicio', [ServicioController::class, 'info'])->name('info-servicio')->middleware('auth');
Route::get('/servicio/info/{id}', [ServicioController::class, 'infoServicio'])->name('info-servicio')->middleware('auth');
Route::post('/realizar-servicio', [ServicioController::class, 'realizarServicio'])->name('realizar-servicio')->middleware('auth');
// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
