<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//CLIENTE

Route::get('/clientes',[ClienteController::class,'index'])->middleware('auth');
Route::get('/cliente/nuevo',[ClienteController::class,'create'])->middleware('auth');
Route::post('/cliente/nuevo',[ClienteController::class,'store'])->middleware('auth');
Route::get('/cliente/editar/{id}',[ClienteController::class,'edit'])->middleware('auth');
Route::post('/cliente/editar/{id}',[ClienteController::class,'update'])->middleware('auth');

//ROLES
Route::get('/roles',[RolesController::class,'index'])->middleware('auth');
Route::get('/roles',[RolesController::class,'index'])->middleware('auth');
Route::get('/roles/nuevo',[RolesController::class,'create'])->middleware('auth');
Route::post('/roles/nuevo',[RolesController::class,'store'])->middleware('auth');
Route::get('/roles/editar/{id}',[RolesController::class,'edit'])->middleware('auth');
Route::patch('/roles/nuevo/{id}',[RolesController::class,'update'])->middleware('auth');
Route::delete('/roles/{id}',[RolesController::class,'destroy'])->middleware('auth');

//USUARIOS
Route::get('/usuarios',[UsuarioController::class,'index'])->middleware('auth');
Route::get('/usuario/nuevo',[UsuarioController::class,'create'])->middleware('auth');
Route::post('/usuario/nuevo',[UsuarioController::class,'store'])->middleware('auth');
Route::get('/usuario/editar/{id}',[UsuarioController::class,'edit'])->middleware('auth');
Route::post('/usuario/editar/{id}',[UsuarioController::class,'update'])->middleware('auth');
//Route::post('/imagen/validar' ,[UsuarioController::class,'validar']);
Route::delete('/usuario/{id}',[UsuarioController::class,'destroy'])->middleware('auth');

//SUCURSALES
Route::get('/sucursales',[SucursalController::class,'index'])->middleware('auth');
Route::get('/sucursal/nuevo',[SucursalController::class,'create'])->middleware('auth');
Route::post('/sucursal/nuevo',[SucursalController::class,'store']);
Route::get('/sucursal/editar/{id}',[SucursalController::class,'edit'])->middleware('auth');
Route::post('/sucursal/editar/{id}',[SucursalController::class,'update'])->middleware('auth');
Route::delete('/sucursal/{id}',[SucursalController::class,'destroy'])->middleware('auth');

//ALMACENES
Route::get('/almacenes',[AlmacenController::class,'index'])->middleware('auth');
Route::get('/almacen/nuevo',[AlmacenController::class,'create'])->middleware('auth');
Route::post('/almacen/nuevo',[AlmacenController::class,'store'])->middleware('auth');
Route::get('/almacen/editar/{id}',[AlmacenController::class,'edit'])->middleware('auth');
Route::post('/almacen/editar/{id}',[AlmacenController::class,'update'])->middleware('auth');
Route::delete('/almacen/{id}',[AlmacenController::class,'destroy']);

//PROVEEDOR
Route::get('/proveedores',[ProveedorController::class,'index'])->middleware('auth');
Route::get('/proveedor/nuevo',[ProveedorController::class,'create'])->middleware('auth');
Route::post('/proveedor/nuevo',[ProveedorController::class,'store'])->middleware('auth');
Route::get('/proveedor/editar/{id}',[ProveedorController::class,'edit'])->middleware('auth');
Route::post('/proveedor/editar/{id}',[ProveedorController::class,'update'])->middleware('auth');
Route::delete('/proveedor/{id}',[ProveedorController::class,'destroy'])->middleware('auth');

//INVENTARIOS
Route::get('/inventarios',[InventarioController::class,'index'])->middleware('auth');
Route::get('/inventario/nuevo',[InventarioController::class,'create'])->middleware('auth');
Route::post('/inventario/nuevo',[InventarioController::class,'store'])->middleware('auth');
Route::get('/inventarios/almacen/{id}',[InventarioController::class,'inventarioSucursal']);
Route::get('/inventario/almacen/{id}/{id_edit}',[InventarioController::class,'edit'])->middleware('auth');
Route::post('/inventario/editar/{id}',[InventarioController::class,'update'])->middleware('auth');
Route::delete('/inventario/{id}',[InventarioController::class,'destroy'])->middleware('auth');
Route::post('/inventario/getAlmacen',[InventarioController::class,'datosAlmacen'])->middleware('auth');
 

//VENTAS
Route::get('/ventas',[VentaController::class,'index'])->middleware('auth');
Route::get('/venta/nuevo',[VentaController::class,'create'])->middleware('auth');
Route::post('/venta/nuevo',[VentaController::class,'store'])->middleware('auth');
Route::get('/ventas/mostrar/{id}',[VentaController::class,'show'])->middleware('auth');
Route::delete('/venta/{id}',[VentaController::class,'destroy'])->middleware('auth');
Route::post('/autocompletarCliente',[VentaController::class,'autoCompletar'])->middleware('auth');
Route::post('/venta/validarCodigo',[VentaController::class,'validarCodigo'])->middleware('auth');
Route::post('/venta/getAlmacen',[VentaController::class,'datosAlmacen'])->middleware('auth');
Route::post('/venta/getPago',[VentaController::class,'datosPagos'])->middleware('auth');
Route::post('/venta/nuevoDetalle',[VentaController::class,'nuevoDetalle'])->middleware('auth');
Route::post('/venta/datos',[VentaController::class,'datosDetalle'])->middleware('auth');
Route::post('/venta/datosShow',[VentaController::class,'datosDetalleShow'])->middleware('auth');
Route::post('/venta/eliminar',[VentaController::class,'eliminarDetalle'])->middleware('auth');

//COMPRAS   
Route::get('/compras',[CompraController::class,'index'])->middleware('auth');
Route::get('/compra/nueva',[CompraController::class,'create'])->middleware('auth');
Route::post('/compra/nueva',[CompraController::class,'store'])->middleware('auth');
Route::get('/compra/mostrar/{id}',[CompraController::class,'show'])->middleware('auth');
Route::delete('/compra/{id}',[CompraController::class,'destroy'])->middleware('auth');
Route::post('/compra/getAlmacen',[CompraController::class,'datosAlmacen'])->middleware('auth');
Route::post('/autocompletarProducto',[CompraController::class,'autoCompletar'])->middleware('auth');
Route::post('/unidadProducto',[CompraController::class,'unidad'])->middleware('auth');

//REPORTES
Route::get('/reportes',[ReporteController::class,'index'])->middleware('auth');
Route::get('/reporte/nuevo',[ReporteController::class,'create'])->middleware('auth');
Route::post('/reporte/nuevo',[ReporteController::class,'store'])->middleware('auth');

//TRANSFERENCIA
Route::get('/transferencias',[TransferenciaController::class,'index'])->middleware('auth');
Route::get('/solicitudes',[TransferenciaController::class,'solicitudes'])->middleware('auth');
Route::get('/solicitudes/{id}',[TransferenciaController::class,'verSolicitudes'])->middleware('auth');
Route::delete('/solicitudes/{id}',[TransferenciaController::class,'destroy'])->middleware('auth');
Route::post('/solicitudes/aceptarSolicitud',[TransferenciaController::class,'aceptarSolicitud'])->middleware('auth');
Route::post('/solicitudes/cancelarSolicitud',[TransferenciaController::class,'cancelarSolicitud'])->middleware('auth');
Route::post('/solicitudes/solicitudRecibida',[TransferenciaController::class,'solicitudRecibida'])->middleware('auth');
Route::post('/solicitudes/solicitudNoRecibida',[TransferenciaController::class,'solicitudNoRecibida'])->middleware('auth');
Route::post('/transferencias',[TransferenciaController::class,'nuevaSolicitud'])->middleware('auth');
Route::post('/transferencias/solicitar',[TransferenciaController::class,'sucursalAlmacen'])->middleware('auth');
Route::get('/historial',[TransferenciaController::class,'historial'])->middleware('auth');
Route::get('/historial/{id}',[TransferenciaController::class,'verHistorial'])->middleware('auth');
Route::delete('/historial/{id}',[TransferenciaController::class,'destroyHistorial'])->middleware('auth');

//CONFIGURACION
Route::get('/configuraciones',[ConfiguracionController::class,'index'])->middleware('auth');

//CONFIGURACION DE TIPO DE UNIDAD
Route::post('/configuracion/agregarTipoUnidad',[TipoUnidadController::class,'agregarUnidad'])->middleware('auth');
Route::post('/configuracion/datosUnidaed',[TipoUnidadController::class,'datosTipoUnidad'])->middleware('auth');
Route::post('/configuracion/actualizarUnidad',[TipoUnidadController::class,'actualizarTipoUnidad'])->middleware('auth');
Route::post('/configuracion/eliminar',[TipoUnidadController::class,'eliminarTipoUnidad'])->middleware('auth');

//CONFIGURACION DE TIPO DE PAGO
Route::post('/configuracion/nuevoTipoPago',[TipoPagoController::class,'agregarTipoPago'])->middleware('auth');
Route::post('/configuracion/datosPago',[TipoPagoController::class,'datosTipoPago'])->middleware('auth');
Route::post('/configuracion/actualizarPago',[TipoPagoController::class,'actualizarTipoPago'])->middleware('auth');
Route::post('/configuracion/eliminarPago',[TipoPagoController::class,'eliminarTipoPago'])->middleware('auth');

//Detalle de tipo de pago
Route::post('/configuracion/nuevoPagoDetalle',[TipoPagoDetallesController::class,'agregarPagoDetalles'])->middleware('auth');
Route::post('/configuracion/datosDetalle',[TipoPagoDetallesController::class,'datosPagoDetalles'])->middleware('auth');
Route::post('/configuracion/eliminarPagoDetalle',[TipoPagoDetallesController::class,'eliminarPagoDetalles'])->middleware('auth');

//script
Route::post('/usuario/nuevo/validarCorreo', [UsuarioController::class,'validarCorreo'])->middleware('auth');
 
 
/*Puede llamar a un comando de Artisan fuera de la CLI.
Route::get('/clear-cache', function() {
$exitCode = Artisan::call('cache:clear');
// return what you want
});*/

//Route::get('/send-mail', [MailController::class, 'index']);