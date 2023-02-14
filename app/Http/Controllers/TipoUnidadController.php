<?php

namespace App\Http\Controllers;

use App\Models\TipoUnidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoUnidadController extends Controller
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
     * @param  \App\Models\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoUnidad $tipoUnidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoUnidad $tipoUnidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoUnidad $tipoUnidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoUnidad  $tipoUnidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoUnidad $tipoUnidad)
    {
        //
    }

    public function agregarUnidad()
    {
        $unidad = new TipoUnidad();
        $unidad->nombre_unidad = $_POST["nombreUnidad"];
        $unidad->save();

        return json_encode(array('data'=>true));

    }

    public function datosTipoUnidad(){
        
        $datos = DB::table('tipo_unidads')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarTipoUnidad(){

        $datoUnidad = TipoUnidad::find($_POST["id_unidad"]);
        $datoUnidad->nombre_unidad = $_POST["unidad"];
        $datoUnidad->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarTipoUnidad(){
 
                    
        $unidad=TipoUnidad::findOrFail($_POST["id"]);
        $unidad->delete();

        return json_encode(array('data'=>true));
    }
}
