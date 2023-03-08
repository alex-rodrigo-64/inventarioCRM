<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reporte.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursal = DB::table('sucursals')
                ->select('*')
                ->get();

        $almacen = DB::table('almacens')
                ->select('*')
                ->get();

        return view('reporte.create',compact('sucursal','almacen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte, $id, $fecha_inicial, $fecha_fin)
    {           
 
        $venta_elegida = DB::table('ventas')
                    ->join('detalle_ventas','detalle_ventas.id_venta','=','ventas.id')
                    ->join('sucursals','sucursals.id','=','ventas.id_sucursal')
                    ->join('almacens','almacens.id','=','ventas.id_almacen')
                    ->select('*')
                    ->where('ventas.created_at', '>=' ,$fecha_inicial)
                    ->where('ventas.created_at', '<=' ,$fecha_fin)
                    ->where('ventas.id_almacen','=',$id)
                    ->get();

                    //dd($venta_elegida);

        return view('reporte.show',compact('venta_elegida','fecha_inicial','fecha_fin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        //
    }

    public function datosAlmacen()
    {
        $almacen =  DB::table('almacens')
            ->select('*')
            ->where('id_sucursal',$_POST["sucursal"])
            ->get();
        
        return json_encode(array('data'=>$almacen));
    }

    public function nuevoReporte(){

        $fecha_inicial = date("Y-m-d", strtotime($_POST['fechaInicio']));
        $fecha_fin = date("Y-m-d", strtotime($_POST['fechaFin']));
                
         $reporteNuevo = DB::table('ventas')
                //->whereBetween('created_at', array($date1,$date2))
                ->where('created_at', '>=' ,$fecha_inicial)
                ->where('created_at', '<=' ,$fecha_fin)
                ->where('id_sucursal','=',$_POST["sucursal"])
                ->where('id_almacen','=',$_POST["almacen"])
                ->exists();


             return json_encode(array('data'=>$reporteNuevo));

    }
}
