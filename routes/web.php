<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\InventarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin/user/settings', function () {
    return view('profile.show');
});

Route::resource('admin/expedientes', ExpedienteController::class)->middleware(['can:tenant', 'verified']);
Route::resource('admin/diagnosticos', DiagnosticoController::class)->middleware(['can:tenant', 'verified']);
Route::resource('admin/citas', CitaController::class)->middleware(['can:tenant', 'verified']);
Route::resource('admin/recetas', RecetaController::class)->middleware(['can:tenant', 'verified']);
Route::resource('admin/inventario', InventarioController::class)->middleware(['can:tenant', 'verified']);

// -----Rutas de los administradores

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/crearUsuario/', 'crear')->name('admin.crear')->middleware(['can:admin', 'verified']);
    Route::post('admin/crearUsuario/', 'store')->name('admin.store')->middleware(['can:admin', 'verified']);
});
