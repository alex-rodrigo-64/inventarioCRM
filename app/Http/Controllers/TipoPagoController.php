<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoPagoController extends Controller
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
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPago $tipoPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPago $tipoPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPago $tipoPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPago $tipoPago)
    {
        //
    }

    public function agregarTipoPago()
    {
        $unidad = new TipoPago();
        $unidad->nombre_pago = $_POST["nombrePago"];
        $unidad->save();

        return json_encode(array('data'=>true));

    }

    public function datosTipoPago(){
        
        $datos = DB::table('tipo_pagos')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarTipoPago(){

        $datoPago = TipoPago::find($_POST["id_pago"]);
        $datoPago->nombre_pago = $_POST["pago"];
        $datoPago->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarTipoPago(){
 
                    
        $pago=TipoPago::findOrFail($_POST["id"]);
        $pago->delete();

        return json_encode(array('data'=>true));
    }
}
