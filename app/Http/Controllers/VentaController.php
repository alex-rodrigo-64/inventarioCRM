<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Inventario;
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
                    ->join('sucursals','ventas.id_sucursal','=','sucursals.id')
                    ->join('almacens','ventas.id_almacen','=','almacens.id')
                    ->select('ventas.id','ventas.detalle', 'ventas.created_at','ventas.id_cliente',
                                'sucursals.nombre_sucursal','almacens.nombre_almacen')
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
        $posicion_coincidencia = strpos($request->get('cliente'), ',');

        $cliente = substr($request->get('cliente'), 0, $posicion_coincidencia);

        $identificado = DB::table('clientes')
                    ->select('id')
                    ->where('nombreCliente','=',$cliente)
                    ->first();
                        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $acceso = substr(str_shuffle($permitted_chars), 0, 16);

        $datoVenta = new Venta();
        $datoVenta-> id_sucursal = $request->get('sucursal');
        $datoVenta-> id_almacen = $request->get('almacen');
        $datoVenta-> id_cliente = $identificado->id;
        $datoVenta-> tipo_pago = $request->get('pago');
        $datoVenta-> detalle_pago = $request->get('detallePago');
        $datoVenta-> detalle = $request->get('detalle');
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
         $detalle-> codigo = $_POST["codigoVenta"];
         $detalle-> cantidad = $_POST["cantidad"];
         $detalle-> unidad = $_POST["unidad"];
         $detalle-> descripcion = $_POST["descripcion"];
         $detalle-> precio_unitario = $_POST["precioUnitario"];
         $detalle-> precio_total = $_POST["precioTotal"];
         $detalle-> bandera = 'no';
         $detalle-> save();

        return json_encode(array('data'=>true));

    }

    public function datosDetalle(){

        $datos = DB::table('detalle_ventas')
                ->select('*')
                ->where('bandera','=','no')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function datosDetalleShow(){

        $datos = DB::table('detalle_ventas')
                ->select('*')
                ->where('id_venta','=',$_POST["id"])
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function eliminarDetalle(){
 
                    
        $detalle=DetalleVenta::findOrFail($_POST["id"]);
        $detalle->delete();

        return json_encode(array('data'=>true));
    }

    function autoCompletar(Request $request){

        if($request->get('query')){

            $query = $request->get('query');

            $existe = DB::table('clientes')
                    ->where('nombreCliente', 'LIKE', "{$query}%")
                    ->exists();

            if ($existe) {
                $data = DB::table('clientes')
                        ->where('nombreCliente', 'LIKE', "{$query}%")
                        ->get();
                            
                $output = '<datalist id="codigo">';
                foreach($data as $row)
                {
                $output .= '
                <option>'.$row->nombreCliente.', '.$row->direccion.'</option>
                ';
                }
                $output .= '</datalist>';
                echo $output;
            }else{
                return 1;
            }
            
            }else{
                return 0;
            }
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
            $cliente_elegido = DB::table('ventas')
                    ->join('clientes','ventas.id_cliente','=','clientes.id')
                    ->select('clientes.nombreCliente')
                    ->where('ventas.id','=',$id)
                    ->first();

            $venta_elegida = DB::table('ventas')
                    ->join('sucursals','ventas.id_sucursal','=','sucursals.id')
                    ->join('almacens','ventas.id_almacen','=','almacens.id')
                    ->select('ventas.id','ventas.detalle',
                                'sucursals.nombre_sucursal','almacens.nombre_almacen')
                    ->where('ventas.id','=',$id)
                    ->where('ventas.id','=',$id)
                    ->first();

            $pago_elegido = DB::table('ventas')
                    ->join('tipo_pagos','ventas.tipo_pago','=','tipo_pagos.id')
                    ->join('tipo_pago_detalles','ventas.detalle_pago','=','tipo_pago_detalles.id')
                    ->select('tipo_pagos.nombre_pago','tipo_pago_detalles.pago_detalle')
                    ->where('ventas.id','=',$id)
                    ->where('ventas.id','=',$id)
                    ->first();

                   // dd($pago_elegido);
            
            return view('venta.show',compact('venta_elegida','pago_elegido','venta','cliente_elegido'));

        } catch (\Throwable $th) {
            
            return view('errors.errorShowVenta');
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

    public function validarCodigo(){
        
        $db_handle = new Inventario();

        if(!empty($_POST["codigoVenta"])) {
            
            $code_count = $db_handle->validarCodigo($_POST["codigoVenta"]);

            if($code_count){
                return 0;
            }else{
                if($code_count == false) {
                    return 1;
                }
            }
            
        }
    }
}
