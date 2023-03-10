<?php

namespace App\Http\Controllers;

use App\Models\ReporteInventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteInventarioController extends Controller
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

        return view('reporteInventario.create',compact('sucursal','almacen'));
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
     * @param  \App\Models\ReporteInventario  $reporteInventario
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteInventario $reporteInventario, $id, $fecha_inicial, $fecha_fin)
    {
        $inventario_elegido = DB::table('inventarios')
                    ->join('sucursals','sucursals.id','=','inventarios.id_sucursal')
                    ->join('almacens','almacens.id','=','inventarios.id_almacen')
                    ->select('*')
                    ->where('inventarios.created_at', '>=' ,$fecha_inicial)
                    ->where('inventarios.created_at', '<=' ,$fecha_fin)
                    ->where('inventarios.id_almacen','=',$id)
                    ->get();

                   // dd($inventario_elegido);

        return view('reporteInventario.show',compact('inventario_elegido','fecha_inicial','fecha_fin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteInventario  $reporteInventario
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteInventario $reporteInventario)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteInventario  $reporteInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReporteInventario $reporteInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteInventario  $reporteInventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReporteInventario $reporteInventario)
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
                
         $reporteNuevo = DB::table('inventarios')
                //->whereBetween('created_at', array($date1,$date2))
                ->where('created_at', '>=' ,$fecha_inicial)
                ->where('created_at', '<=' ,$fecha_fin)
                ->where('id_sucursal','=',$_POST["sucursal"])
                ->where('id_almacen','=',$_POST["almacen"])
                ->exists();


             return json_encode(array('data'=>$reporteNuevo));

    }
}
