<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = DB::table('compras')
                    ->select('*')
                    ->paginate(25);
        return view('compra.index',compact('compras'));
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

        $proveedor = DB::table('proveedors')
                ->select('*')
                ->get();

        return view('compra.create',compact('sucursal','almacen','unidad','proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $posicion_coincidencia = strpos($request->get('producto'), ',');

        $codigo = substr($request->get('producto'), 0, $posicion_coincidencia);

        $identificado = DB::table('inventarios')
                    ->select('*')
                    ->where('codigo','=',$codigo)
                    ->first();

        $cantidad_nueva = $identificado->cantidad + $request->get('cantidad');
        $cantidad_unitaria_nueva = $identificado->cantidad_unitaria + $request->get('cantidadUnitaria');


        $compra = new Compra();

        $compra-> id_sucursal = $request->get('sucursal');
        $compra-> id_almacen = $request->get('almacen');
        $compra-> codigo_producto = $codigo;
        $compra-> proveedor = $request->get('proveedor');
        $compra-> cantidad = $request->get('cantidad');
        $compra-> unidad = $request->get('cantidadP');
        $compra-> cantidad_unitaria = $request->get('cantidadUnitaria');
        $compra-> costo_adquisicion = $request->get('costoAdqui');
        $compra-> costo_adquisicion_antiguo = $identificado->cantidad;
        $compra-> precio_venta = $request->get('costoVenta');
        $compra-> precio_venta_unitario = $request->get('costoUni');
        $compra-> detalle = $request->get('descripcion');
        $compra-> save();

        DB::table('inventarios')
                ->where('id', '=', $identificado->id)
                ->update(['cantidad' => $cantidad_nueva,
                            'cantidad_unitaria' => $cantidad_unitaria_nueva,
                            'costo_adquisicion' => $request->get('costoAdqui')
                        ]);

        if ($request->get('costoVenta') != null ) {
        
            $costo_venta = $request->get('costoVenta');
            DB::table('inventarios')
                ->where('id', '=', $identificado->id)
                ->update(['precio_venta' => $costo_venta]);

        }

        if ($request->get('costoUni') != null) {
            
            $costo_unitario = $request->get('costoUni');
            DB::table('inventarios')
                ->where('id', '=', $identificado->id)
                ->update(['precio_venta_unitario' => $costo_unitario]);
        }

        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra,$id)
    {
        $compra = DB::table('compras')
                    ->select('*')
                    ->where('id',$id)
                    ->first();
                
        $producto = DB::table('inventarios')
                    ->select('*')
                    ->where('codigo',$compra->codigo_producto)
                    ->first();

        return view('compra.show',compact('compra','producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra, $id)
    {
        $compra_registrada = DB::table('compras')
                        ->select('*')
                        ->where('id',$id)
                        ->first();
        $inventario = DB::table('inventarios')
                        ->select('*')
                        ->where('codigo',$compra_registrada->codigo)
                        ->first();

        $cantidad_nueva = $compra_registrada->cantidad - $inventario->cantidad;
        $cantidad_unitaria_nueva = $compra_registrada->cantidad_unitaria - $inventario->cantidad_unitaria;

         DB::table('inventarios')
                ->where('codigo', '=', $compra_registrada->codigo)
                ->update(['cantidad' => $cantidad_nueva,
                            'cantidad_unitaria' => $cantidad_unitaria_nueva,
                            'costo_adquisicion_antiguo' => $compra_registrada->costo_adquisicion_antiguo
                        ]);

        $Compra=Compra::findOrFail($id);
        $Compra->delete();

        return redirect('/compras');
    }

    public function datosAlmacen()
    {
        $sucursal = DB::table('sucursals')
                ->select('*')
                ->where('nombre_sucursal',$_POST["sucursal"])
                ->first();

        $almacen =  DB::table('almacens')
            ->select('*')
            ->where('id_sucursal',$sucursal->id)
            ->get();
        
        return json_encode(array('data'=>$almacen));
    }

    function autoCompletar(Request $request){

        if($request->get('query'))
            {

                $sucursal = DB::table('sucursals')
                        ->select('*')
                        ->where('nombre_sucursal',$_POST["sucursal"])
                        ->first();

                $almacen =  DB::table('almacens')
                        ->select('*')
                        ->where('nombre_almacen',$_POST["almacen"])
                        ->first();

                if (strpos($request->get('query'), ',')) {
                     $posicion_coincidencia = strpos($request->get('query'), ',');
        
                     $query = substr($request->get('query'), 0, $posicion_coincidencia);
                }else{
                    $query = $request->get('query');
                }

            $existe = DB::table('inventarios')
                    ->where('nombre_producto', 'LIKE', "{$query}%")
                    ->where('id_sucursal', $sucursal->id)
                    ->where('id_almacen', $almacen->id )
                    ->orWhere('codigo', 'LIKE', "{$query}%")
                    ->exists();

            $data = DB::table('inventarios')
                    ->where('nombre_producto', 'LIKE', "{$query}%")
                    ->where('id_sucursal', $sucursal->id)
                    ->where('id_almacen', $almacen->id )
                    ->orWhere('codigo', 'LIKE', "{$query}%")
                    ->get();
                        
            if ( $existe) {
                $output = '<datalist id="codigo">';
                foreach($data as $row)
                {
                $output .= '
                <option>'.$row->codigo.', '.$row->nombre_producto.'</option>
                ';
                }
                $output .= '</datalist>';
                echo $output;
            } else {
                return 0;
            }
            
           
            }
    }

    public function unidad()
    {

        $posicion_coincidencia = strpos($_POST["valor"], ',');

        $codigo = substr($_POST["valor"], 0, $posicion_coincidencia);

        $identificado = DB::table('inventarios')
                    ->select('*')
                    ->where('codigo','=',$codigo)
                    ->get();
    
        return json_encode(array('datos'=>$identificado));
    }
}
