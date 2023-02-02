<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfiguracionVentaController extends Controller
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
        //
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
     * @param  \App\Models\ConfiguracionVenta  $configuracionVenta
     * @return \Illuminate\Http\Response
     */
    public function show(ConfiguracionVenta $configuracionVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfiguracionVenta  $configuracionVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfiguracionVenta $configuracionVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfiguracionVenta  $configuracionVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfiguracionVenta $configuracionVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfiguracionVenta  $configuracionVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfiguracionVenta $configuracionVenta)
    {
        //
    }

    public function agregarUnidad()
    {
        $unidad = new ConfiguracionVenta();
        $unidad->nombre_unidad = $_POST["nombreUnidad"];
        $unidad->save();

        $unidadGuardada = DB::table('configuracion_ventas')
                ->select('*')
                ->where('id','=',$_POST["id"])
                ->get();

        return json_encode(array('data'=>$unidadGuardada));

    }

}
