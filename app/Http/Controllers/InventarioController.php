<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:ver inventarios|crear inventario|editar inventario|borrar inventario',['only'=>['index']]);
        $this->middleware('permission:crear inventario',['only'=>['create','store']]);
        $this->middleware('permission:editar inventario',['only'=>['edit','update']]);
        $this->middleware('permission:borrar inventario',['only'=>['destroy']]);
    }


    public function index()
    {   
        $sucursales = DB::table('sucursals')
                        ->select('*')
                        ->get();

        $almacenes = DB::table('almacens')
                        ->select('*')
                        ->get();

        $arreglo = [];
        
        foreach ($sucursales as $sucursal) {
            $contador = 0;
            $sucu = [
                'contador' => 0,
            ];
            array_push($sucu , $sucursal);
            foreach ($almacenes as $almacen) {
                if($almacen->id_sucursal == $sucursal->id){
                   array_push($sucu , $almacen); 
                   $contador = $contador + 1;
                }
            }
            $sucu['contador']=$contador;
            array_push($arreglo , $sucu); 
        }

       // dd($arreglo);

        return view('inventario.index',compact('arreglo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad = DB::table('tipo_unidads')
                        ->select('*')
                        ->get();
        $sucursales = DB::table('sucursals')
                        ->select('*')
                        ->get();
        return view('inventario.create',compact('sucursales','unidad'));
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

        return redirect('/inventarios');
    }

    public function inventarioSucursal($id){

        $inventario = DB::table('inventarios')
                    ->select('*')
                    ->where('id_almacen',$id)
                    ->get();

        $almacen = DB::table('almacens')
                    ->select('nombre_almacen')
                    ->where('id',$id)
                    ->first();
 

        return view('inventario.sucursal',compact('inventario','almacen'));
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
