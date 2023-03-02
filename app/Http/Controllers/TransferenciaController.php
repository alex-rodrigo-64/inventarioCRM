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

        $unidad = DB::table('tipo_unidads')
                        ->select('*')
                        ->get();
        return view('transferencia.index',compact('sucursal','unidad'));
    }

    public function solicitudes(){
        return view('transferencia.solicitud');
    }


    public function nuevaSolicitud(Request $request){

        $inventario = new Transferencia();
        $inventario->id_origen = $request->get('codigo');
        $inventario->id_destino = $request->get('nombreProducto');
        $inventario->nombre_producto = $request->get('proveedor');
        $inventario->cantidad = $request->get('cantidad');
        $inventario->unidad = $request->get('cantidadP');
        $inventario->detalle = $request->get('cantidadUnitaria');
        $inventario->estado = "Pendiente";
        $inventario->save();

        return redirect('/solicitudes');
    }

    public function sucursalAlmacen(){

        $almacen =  DB::table('almacens')
                ->select('*')
                ->where('id_sucursal',$_POST["sucursal"])
                ->get();
    
        return json_encode(array('data'=>$almacen));
    }


  
}
