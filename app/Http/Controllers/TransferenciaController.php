<?php

namespace App\Http\Controllers;

use App\Models\Transferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursal = DB::table('sucursals')
                        ->select('*')
                        ->get();

        $sucursales = DB::table('sucursals')
                        ->select('*')
                        ->get();                

        $unidad = DB::table('tipo_unidads')
                        ->select('*')
                        ->get();
        return view('transferencia.index',compact('sucursal','unidad','sucursales'));
    }

    public function solicitudes(){

        $transferencias = DB::table('transferencias')
                ->select('*')
                ->orderBy('created_at', 'desc')
                ->paginate(15);

        return view('transferencia.solicitud',compact('transferencias'));
    }

    public function verSolicitudes($id){

        $transfe = DB::table('transferencias')
                ->select('*')
                ->where('id',$id)
                ->first();
        return view('transferencia.show',compact('transfe'));
    }


    public function nuevaSolicitud(Request $request){

        $inventario = new Transferencia();
        $inventario->id_origen = $request->get('sucursalOrigen');
        $inventario->id_almacen = $request->get('almacen');
        $inventario->id_destino = $request->get('sucursalDestino');
        $inventario->nombre_producto = $request->get('nombreProducto');
        $inventario->cantidad = $request->get('cantidad');
        $inventario->unidad = $request->get('cantidadP');
        $inventario->detalle = $request->get('detalle');
        $inventario->estado = "Pendiente";
        $inventario->save();

        return redirect('/solicitudes');
    }

    public function sucursalAlmacen(){

        $sucur =  DB::table('sucursals')
                ->select('id')
                ->where('nombre_sucursal',$_POST["sucursal"])
                ->first();

        $almacen =  DB::table('almacens')
                ->select('*')
                ->where('id_sucursal',$sucur->id)
                ->get();
    
        return json_encode(array('data'=>$almacen));
    }

    public function destroy($id)
    {
        $detalle=Transferencia::findOrFail($id);
        $detalle->delete();

        return redirect('/solicitudes');
    }


  
}
