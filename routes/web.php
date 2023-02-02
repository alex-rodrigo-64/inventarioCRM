<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClonesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginClienteController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SucursalController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});
  
Auth::routes();

//HOME
Route::get('/home', [HomeController::class, 'index'])->name('home');

//CLIENTE

Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/cliente/nuevo',[ClienteController::class,'create']);
Route::post('/cliente/nuevo',[ClienteController::class,'store']);
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit']);
Route::post('/cliente/editar/{id}',[ClienteController::class,'update']);

//ROLES
Route::get('/roles',[RolesController::class,'index']);
Route::get('/roles',[RolesController::class,'index']);
Route::get('/roles/nuevo',[RolesController::class,'create']);
Route::post('/roles/nuevo',[RolesController::class,'store']);
Route::get('/roles/editar/{id}',[RolesController::class,'edit']);
Route::patch('/roles/nuevo/{id}',[RolesController::class,'update']);
Route::delete('/roles/{id}',[RolesController::class,'destroy']);

//USUARIOS
Route::get('/usuarios',[UsuarioController::class,'index']);
Route::get('/usuario/nuevo',[UsuarioController::class,'create']);
Route::post('/usuario/nuevo',[UsuarioController::class,'store']);
Route::get('/usuario/editar/{id}',[UsuarioController::class,'edit']);
Route::post('/usuario/editar/{id}',[UsuarioController::class,'update']);
//Route::post('/imagen/validar' ,[UsuarioController::class,'validar']);
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy']);

//SUCURSALES
Route::get('/sucursales',[SucursalController::class,'index']);
Route::get('/sucursal/nuevo',[SucursalController::class,'create']);
Route::post('/sucursal/nuevo',[SucursalController::class,'store']);
Route::get('/sucursal/editar/{id}',[SucursalController::class,'edit']);
Route::post('/sucursal/editar/{id}',[SucursalController::class,'update']);
Route::delete('/sucursal/{id}',[SucursalController::class,'destroy']);

//ALMACENES
Route::get('/almacenes',[AlmacenController::class,'index']);
Route::get('/almacen/nuevo',[AlmacenController::class,'create']);
Route::post('/almacen/nuevo',[AlmacenController::class,'store']);
Route::get('/almacen/editar/{id}',[AlmacenController::class,'edit']);
Route::post('/almacen/editar/{id}',[AlmacenController::class,'update']);
Route::delete('/almacen/{id}',[AlmacenController::class,'destroy']);

//INVENTARIOS
Route::get('/inventario',[InventarioController::class,'index']);
Route::get('/inventario/nuevo',[InventarioController::class,'create']);
Route::post('/inventario/nuevo',[InventarioController::class,'store']);
Route::get('/inventario/editar/{id}',[InventarioController::class,'edit']);
Route::post('/inventario/editar/{id}',[InventarioController::class,'update']);
Route::delete('/inventario/{id}',[InventarioController::class,'destroy']);
Route::post('/inventario/getAlmacen',[InventarioController::class,'datosAlmacen']);


//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo']);
 
 
/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/

//Route::get('/send-mail', [MailController::class, 'index']);