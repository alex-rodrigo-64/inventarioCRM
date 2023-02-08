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
        $sucursales = DB::table('sucursals')
                        ->select('*')
                        ->get();
        return view('inventario.index',compact('sucursales'));
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
        $valor = $request->get('cantidad')* $request->get('cantidadUnitaria');
        //dd( $request->all());

        $inventario = new Inventario();
        $inventario->codigo = $request->get('codigo');
        $inventario->nombre_producto = $request->get('nombreProducto');
        $inventario->proveedor = $request->get('proveedor');
        $inventario->cantidad = $request->get('cantidad');
        $inventario->unidad = $request->get('cantidadP');
        $inventario->cantidad_unitaria = $request->get('cantidadUnitaria');
        $inventario->cantidad_unitaria_total = $valor;
        $inventario->costo_adquisicion = $request->get('costoAdqui');
        $inventario->precio_venta =$request->get('costoVenta');
        $inventario->precio_venta_unitario =$request->get('costoUni');
        $inventario->detalle = $request->get('nota');
        $inventario->id_sucursal =$request->get('sucursal');
        $inventario->id_almacen =$request->get('almacen');
        $inventario->save();

        return redirect('/inventario');
    }

    public function inventarioSucursal($id){

        $sucursal = DB::table('sucursals')
                    ->select('nombre_sucursal')
                    ->where('id',$id)
                    ->first();


        $almacenes = DB::table('almacens')
                    ->select('*')
                    ->where('id_sucursal',$id)
                    ->get();

        return view('inventario.sucursal',compact('almacenes','sucursal'));
    }

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
