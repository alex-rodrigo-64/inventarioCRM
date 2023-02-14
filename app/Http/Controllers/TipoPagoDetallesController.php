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

    public function agregarTipoPagoDetalles()
    {
        $detalle = new TipoPagoDetalles();
        $detalle->pago_detalle = $_POST["nombrePago"];
        $detalle->save();

        return json_encode(array('data'=>true));

    }

    public function datosTipoPagoDetalles(){
        
        $datos = DB::table('tipo_pagos')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarTipoPagoDetalles(){

        $datoPagoDetalle = TipoPagoDetalles::find($_POST["id_detalle"]);
        $datoPagoDetalle->pago_detalle = $_POST["detalle"];
        $datoPagoDetalle->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarTipoPagoDetalles(){
 
                    
        $detalle=TipoPagoDetalles::findOrFail($_POST["id"]);
        $detalle->delete();

        return json_encode(array('data'=>true));
    }
}
