<?php

namespace App\Http\Controllers;

use App\Models\TipoPagoDetalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoPagoDetallesController extends Controller
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
     * @param  \App\Models\TipoPagoDetalles  $tipoPagoDetalles
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPagoDetalles $tipoPagoDetalles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPagoDetalles  $tipoPagoDetalles
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPagoDetalles $tipoPagoDetalles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPagoDetalles  $tipoPagoDetalles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPagoDetalles $tipoPagoDetalles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPagoDetalles  $tipoPagoDetalles
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPagoDetalles $tipoPagoDetalles)
    {
        //
    }

    public function agregarPagoDetalles()
    {
        $detalle = new TipoPagoDetalles();
        $detalle->pago_detalle = $_POST["pagoDetalle"];
        $detalle->id_tipo_pago = $_POST["pago"];
        $detalle->save();

        return json_encode(array('data'=>true));

    }

    public function datosPagoDetalles(){
        
        $datos = DB::table('tipo_pago_detalles')
                ->join('tipo_pagos','tipo_pagos.id','=','tipo_pago_detalles.id_tipo_pago')
                ->select('tipo_pagos.nombre_pago','tipo_pago_detalles.pago_detalle')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function eliminarPagoDetalles(){
 
                    
        $detalle=TipoPagoDetalles::findOrFail($_POST["id"]);
        $detalle->delete();

        return json_encode(array('data'=>true));
    }
}
