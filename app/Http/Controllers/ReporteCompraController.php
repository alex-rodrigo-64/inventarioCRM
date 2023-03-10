<?php

namespace App\Http\Controllers;

use App\Models\ReporteCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return view('reporteCompra.create',compact('sucursal','almacen'));
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
     * @param  \App\Models\ReporteCompra  $reporteCompra
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteCompra $reporteCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteCompra  $reporteCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteCompra $reporteCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteCompra  $reporteCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReporteCompra $reporteCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteCompra  $reporteCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReporteCompra $reporteCompra)
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

    public function nuevoReporteCompra(){

        $fecha_inicial = date("Y-m-d", strtotime($_POST['fechaInicio']));
        $fecha_fin = date("Y-m-d", strtotime($_POST['fechaFin']));
                
         $reporteNuevo = DB::table('compras')
                //->whereBetween('created_at', array($date1,$date2))
                ->where('created_at', '>=' ,$fecha_inicial)
                ->where('created_at', '<=' ,$fecha_fin)
                ->where('id_sucursal','=',$_POST["sucursal"])
                ->where('id_almacen','=',$_POST["almacen"])
                ->exists();


             return json_encode(array('data'=>$reporteNuevo));

    }
}
