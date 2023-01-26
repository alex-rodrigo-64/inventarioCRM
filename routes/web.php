<?php

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

//LOGIN CLIENTE
Route::get('/login/cliente', [LoginClienteController::class, 'index']);
Route::get('/login/cliente/{id}', [LoginClienteController::class, 'vistaCliente']);
Route::post('/login/cliente', [LoginClienteController::class, 'start']);

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

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo']);
 
 
/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/

//Route::get('/send-mail', [MailController::class, 'index']);