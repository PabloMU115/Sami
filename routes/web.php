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

Route::resource('admin/expedientes', ExpedienteController::class)->middleware(['verified'])->middleware(['can:tenant', 'verified']);

//(la ruta, metodo asociado a la ruta)->name(nombre para accesar la ruta);
Route::controller(DiagnosticoController::class)->group(function () {
    Route::get('admin/diagnosticos/lista/', 'indexFiltrado')->name('diagnosticos.indexFiltrado')->middleware(['can:tenant', 'verified']);
    Route::get('admin/diagnosticos/lista/{id}', 'indexFiltrado2')->name('diagnosticos.indexFiltrado2')->middleware(['can:tenant', 'verified']);
});
Route::resource('admin/diagnosticos', DiagnosticoController::class)->middleware(['can:tenant', 'verified']);

Route::controller(CitaController::class)->group(function () {
    Route::get('admin/citas/lista/', 'indexFiltrado')->name('citas.indexFiltrado')->middleware(['can:tenant', 'verified']);
    Route::get('admin/citas/lista/{id}', 'indexFiltrado2')->name('citas.indexFiltrado2')->middleware(['can:tenant', 'verified']);
});
Route::resource('admin/citas', CitaController::class)->middleware(['can:tenant', 'verified']);

Route::controller(RecetaController::class)->group(function () {
    Route::get('admin/recetas/lista/', 'indexFiltrado')->name('recetas.indexFiltrado')->middleware(['can:tenant', 'verified']);
    Route::get('admin/recetas/lista/{id}', 'indexFiltrado2')->name('recetas.indexFiltrado2')->middleware(['can:tenant', 'verified']);
});
Route::resource('admin/recetas', RecetaController::class)->middleware(['can:tenant', 'verified']);

Route::resource('admin/inventario', InventarioController::class)->middleware(['can:tenant', 'verified']);

// Route::controller(Controller::class)->group(function () {
//     Route::get('admin//lista/', 'indexFiltrado')->name('.indexFiltrado')->middleware(['can:tenant', 'verified']);
//     Route::get('admin//lista/{id}', 'indexFiltrado2')->name('.indexFiltrado2')->middleware(['can:tenant', 'verified']);
// });
// Route::resource('admin/', Controller::class)->middleware(['can:tenant', 'verified']);


// -----Rutas de los administradores

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/crearUsuario/', 'crear')->name('admin.crear')->middleware(['can:admin', 'verified']);
    Route::post('admin/crearUsuario/', 'store')->name('admin.store')->middleware(['can:admin', 'verified']);
});
