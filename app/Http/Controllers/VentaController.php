<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = DB::table('ventas')
                    ->select('*')
                    ->paginate(25);

        return view('venta.index',compact('venta'));
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

        $unidad = DB::table('tipo_unidads')
                ->select('*')
                ->get();

        $tipoPago = DB::table('tipo_pagos')
                ->select('*')
                ->get();

        return view('venta.create',compact('sucursal','almacen','unidad','tipoPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datoVenta = new Venta();
        $datoVenta-> id_sucursal = $request->get('sucursal');
        $datoVenta-> id_almacen = $request->get('almacen');
        $datoVenta-> cliente = $request->get('cliente');
        $datoVenta-> producto = $request->get('producto');
        $datoVenta-> tipo_pago = $request->get('pago');
        $datoVenta-> detalle_pago = $request->get('detallePago');
        $datoVenta-> descripcion = $request->get('descripcion');
        $datoVenta-> bandera = 'no';
        $datoVenta-> save();

        $detalle = DB::table('ventas')
                    ->select('id')
                    ->where('bandera','=','no')
                    ->first();

            DB::table('detalle_ventas')
                    ->where('bandera', '=','no')
                    ->update(['id_venta' => $detalle->id]);

            DB::table('ventas')
                    ->where('bandera', '=','no')
                    ->update(['bandera' => 'si']);


            DB::table('detalle_ventas')
                    ->where('bandera', '=','no')
                    ->update(['bandera' => 'si']);


        return redirect('/ventas');
    }

    public function nuevoDetalle()
    { 

         $detalle = new DetalleVenta();
         $detalle-> codigo = $_POST["codigo"];
         $detalle-> cantidad = $_POST["cantidad"];
         $detalle-> unidad = $_POST["unidad"];
         $detalle-> detalle = $_POST["detalle"];
         $detalle-> precio_unitario = $_POST["precioUnitario"];
         $detalle-> precio_total = $_POST["precioTotal"];
         $detalle-> bandera = 'no';
         $detalle-> save();

        return json_encode(array('data'=>true));

    }

    public function datosDetalle(){
        
        $datos = DB::table('detalle_ventas')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function eliminarDetalle(){
 
                    
        $detalle=DetalleVenta::findOrFail($_POST["id"]);
        $detalle->delete();

        return json_encode(array('data'=>true));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta, $id)
    {
        try {

            $venta_elegida = DB::table('ventas')
                    ->join('sucursals','ventas.id_sucursal','=','sucursals.id')
                    ->join('almacens','ventas.id_almacen','=','almacens.id')
                    ->select('ventas.cliente','ventas.producto','ventas.descripcion',
                                'sucursals.nombre_sucursal','almacens.nombre_almacen')
                    ->where('ventas.id_sucursal','=',$id)
                    ->where('ventas.id_almacen','=',$id)
                    ->first();

            $pago_elegido = DB::table('ventas')
                    ->join('tipo_pagos','ventas.tipo_pago','=','tipo_pagos.id')
                    ->join('tipo_pago_detalles','ventas.detalle_pago','=','tipo_pago_detalles.id')
                    ->select('tipo_pagos.nombre_pago','tipo_pago_detalles.pago_detalle')
                    ->where('ventas.tipo_pago','=',$id)
                    ->where('ventas.detalle_pago','=',$id)
                    ->first();
            
            return view('venta.show',compact('venta_elegida','pago_elegido'));
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta, $id)
    {
        $venta=Venta::findOrFail($id);
        $venta->delete();

        return redirect('/ventas');
    }

    public function datosAlmacen()
    {
        $almacen =  DB::table('almacens')
            ->select('*')
            ->where('id_sucursal',$_POST["sucursal"])
            ->get();
        
        return json_encode(array('data'=>$almacen));
    }

    public function datosPagos()
    {
        $detalle =  DB::table('tipo_pago_detalles')
            ->select('*')
            ->where('id_tipo_pago',$_POST["pago"])
            ->get();
        
        return json_encode(array('data'=>$detalle));
    }
}
