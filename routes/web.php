<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InventarioController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\EmpController;

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
Route::resource('admin/agenda', AgendaController::class)->middleware(['can:tenant', 'verified']);
Route::resource('admin/inventario', InventarioController::class)->middleware(['can:tenant', 'verified']);

// -----Rutas de los administradores

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/crearUsuario/', 'crear')->name('admin.crear')->middleware(['can:admin', 'verified']);
    Route::get('admin/tenantsRegistrados/', 'verTenants')->name('admin.verTenants')->middleware(['can:admin', 'verified']);
    Route::get('admin/historialTenants/', 'verHistorial')->name('admin.verHistorial')->middleware(['can:admin', 'verified']);
    Route::post('admin/crearUsuario/', 'store')->name('admin.store')->middleware(['can:admin', 'verified']);
    Route::get('admin/actualizarPago/', 'actualizar')->name('admin.actualizar')->middleware(['can:tenant', 'verified']);
    Route::put('admin/actualizarPago/', 'update')->name('admin.update')->middleware(['can:tenant', 'verified']);
    Route::get('admin/historialFacturas/', 'verHistorialFacturas')->name('admin.histFacturas')->middleware(['can:admin', 'verified']);
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
// Route::view('facturas', 'livewire.facturas.index')->middleware('auth');
// Route::view('detalles', 'livewire.detalles.index')->middleware('auth');

Route::controller(FacturasController::class)->group(function () {

    Route::post('/generarf/{numeroFactura}', 'generarFactura')->name('/generarf');

    Route::get('listaFact', 'mostrarFacturas')->name('listaFact');

    Route::get('/vistfactra', 'vistaFacturas')->name('vistfactra');
});

Route::get('detalles', [App\Http\Controllers\FacturasController::class, 'index'])->name('detalles');

route::get('/get-factura-pdf', [EmpController::class, 'pdfacturas']);


//PDF

route::get('/vistfactra/download-pdf', [EmpController::class, 'descargarPDF'])->name('convertirpdf');
