<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\tipoproductosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta principal -> abrir directamente el login (GET)
Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');

// Ruta para procesar el login (POST)
Route::post('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login.post');

// Dashboard protegido por auth y email verificado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil protegidas por auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD Productos y Tipos de Productos protegidos por auth
Route::middleware('auth')->group(function () {
    Route::resource('productos', productosController::class);
    Route::resource('tipos-productos', tipoproductosController::class);
});

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';

// Mantener todas las rutas existentes duplicadas
Route::resource('tipoproductos', tipoproductosController::class);
Route::resource('tipo_productos', tipoproductosController::class);
/*$user = App\Models\User::find(1); // 1 = id del usuario
$user->name = 'Tu Nuevo Nombre';
$user->save();
$user->email = 'nuevo_correo@ejemplo.com';
$user->save();

$user->password = Hash::make('nueva_contraseña_segura');
$user->save();*/