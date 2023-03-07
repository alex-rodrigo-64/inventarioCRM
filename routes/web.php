<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\TipoPagoDetallesController;
use App\Http\Controllers\TipoUnidadController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\TransferenciaController;
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

//PROVEEDOR
Route::get('/proveedores',[ProveedorController::class,'index']);
Route::get('/proveedor/nuevo',[ProveedorController::class,'create']);
Route::post('/proveedor/nuevo',[ProveedorController::class,'store']);
Route::get('/proveedor/editar/{id}',[ProveedorController::class,'edit']);
Route::post('/proveedor/editar/{id}',[ProveedorController::class,'update']);
Route::delete('/proveedor/{id}',[ProveedorController::class,'destroy']);

//INVENTARIOS
Route::get('/inventarios',[InventarioController::class,'index']);
Route::get('/inventario/nuevo',[InventarioController::class,'create']);
Route::post('/inventario/nuevo',[InventarioController::class,'store']);
Route::get('/inventarios/almacen/{id}',[InventarioController::class,'inventarioSucursal']);
Route::get('/inventario/almacen/{id}/{id_edit}',[InventarioController::class,'edit']);
Route::post('/inventario/editar/{id}',[InventarioController::class,'update']);
Route::delete('/inventario/{id}',[InventarioController::class,'destroy']);
Route::post('/inventario/getAlmacen',[InventarioController::class,'datosAlmacen']);
 

//VENTAS
Route::get('/ventas',[VentaController::class,'index']);
Route::get('/venta/nuevo',[VentaController::class,'create']);
Route::post('/venta/nuevo',[VentaController::class,'store']);
Route::get('/ventas/mostrar/{id}',[VentaController::class,'show']);
Route::delete('/venta/{id}',[VentaController::class,'destroy']);
Route::post('/autocompletarCliente',[VentaController::class,'autoCompletar']);
Route::post('/venta/validarCodigo',[VentaController::class,'validarCodigo']);
Route::post('/venta/getAlmacen',[VentaController::class,'datosAlmacen']);
Route::post('/venta/getPago',[VentaController::class,'datosPagos']);
Route::post('/venta/nuevoDetalle',[VentaController::class,'nuevoDetalle']);
Route::post('/venta/datos',[VentaController::class,'datosDetalle']);
Route::post('/venta/datosShow',[VentaController::class,'datosDetalleShow']);
Route::post('/venta/eliminar',[VentaController::class,'eliminarDetalle']);

//REPORTES
Route::get('/reportes',[ReporteController::class,'index']);
Route::get('/reporte/nuevo',[ReporteController::class,'create']);
Route::post('/reporte/nuevo',[ReporteController::class,'store']);

//TRANSFERENCIA
Route::get('/transferencias',[TransferenciaController::class,'index']);
Route::get('/solicitudes',[TransferenciaController::class,'solicitudes']);
Route::get('/solicitudes/{id}',[TransferenciaController::class,'verSolicitudes']);
Route::delete('/solicitudes/{id}',[TransferenciaController::class,'destroy']);
Route::post('/solicitudes/aceptarSolicitud',[TransferenciaController::class,'aceptarSolicitud']);
Route::post('/solicitudes/cancelarSolicitud',[TransferenciaController::class,'cancelarSolicitud']);
Route::post('/solicitudes/solicitudRecibida',[TransferenciaController::class,'solicitudRecibida']);
Route::post('/solicitudes/solicitudNoRecibida',[TransferenciaController::class,'solicitudNoRecibida']);
Route::post('/transferencias',[TransferenciaController::class,'nuevaSolicitud']);
Route::post('/transferencias/solicitar',[TransferenciaController::class,'sucursalAlmacen']);
Route::get('/historial',[TransferenciaController::class,'historial']);
Route::get('/historial/{id}',[TransferenciaController::class,'verHistorial']);
Route::delete('/historial/{id}',[TransferenciaController::class,'destroyHistorial']);

//CONFIGURACION
Route::get('/configuraciones',[ConfiguracionController::class,'index']);

//CONFIGURACION DE TIPO DE UNIDAD
Route::post('/configuracion/agregarTipoUnidad',[TipoUnidadController::class,'agregarUnidad']);
Route::post('/configuracion/datosUnidaed',[TipoUnidadController::class,'datosTipoUnidad']);
Route::post('/configuracion/actualizarUnidad',[TipoUnidadController::class,'actualizarTipoUnidad']);
Route::post('/configuracion/eliminar',[TipoUnidadController::class,'eliminarTipoUnidad']);

//CONFIGURACION DE TIPO DE PAGO
Route::post('/configuracion/nuevoTipoPago',[TipoPagoController::class,'agregarTipoPago']);
Route::post('/configuracion/datosPago',[TipoPagoController::class,'datosTipoPago']);
Route::post('/configuracion/actualizarPago',[TipoPagoController::class,'actualizarTipoPago']);
Route::post('/configuracion/eliminarPago',[TipoPagoController::class,'eliminarTipoPago']);

//Detalle de tipo de pago
Route::post('/configuracion/nuevoPagoDetalle',[TipoPagoDetallesController::class,'agregarPagoDetalles']);
Route::post('/configuracion/datosDetalle',[TipoPagoDetallesController::class,'datosPagoDetalles']);
Route::post('/configuracion/eliminarPagoDetalle',[TipoPagoDetallesController::class,'eliminarPagoDetalles']);

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo']);
 
 
/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/

//Route::get('/send-mail', [MailController::class, 'index']);