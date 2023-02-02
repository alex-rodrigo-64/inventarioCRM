<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
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
        $sucursales = DB::table('sucursals')
                        ->select('*')
                        ->get();
        return view('inventario.create',compact('sucursales'));
    }

    public function datosAlmacen()
    {
        
        $almacen =  DB::table('almacens')
            ->select('*')
            ->where('id_sucursal',$_POST["sucursal"])
            ->get();
        
        return json_encode(array('data'=>$almacen));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd( $request->get('paquete'));

        $inventario = new Inventario();
        $inventario->codigo = $request->get('codigo');
        $inventario->nombre_producto = $request->get('nombreProducto');
        $inventario->proveedor = $request->get('proveedor');
        $inventario->paquete = $request->get('paquete');
        $inventario->cantidad_unitaria = $request->get('cantidadUnitaria');
        $inventario->cantidad_total = $request->get('paquete');
        $inventario->costo_adquisicion = $request->get('costoAdqui');
        $inventario->costo_venta =$request->get('costoVenta');
        $inventario->fecha = $request->get('fecha');
        $inventario->detalle = $request->get('nota');
        $inventario->id_sucursal =$request->get('sucursal');
        $inventario->id_almacen =$request->get('almacen');
        $inventario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
