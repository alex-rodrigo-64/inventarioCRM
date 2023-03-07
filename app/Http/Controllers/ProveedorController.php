<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = DB::table('proveedors')
                        ->select('*')
                        ->get();

        return view('proveedor.index',compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      //dd($request);
        $proveedor = new Proveedor();
        $proveedor->nombre_proveedor = $request->get('nombreProveedor');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->celular = $request->get('celular');
        $proveedor->direccion_proveedor = $request->get('direccion');
        $proveedor->detalle = $request->get('detalle');
        $proveedor->save();

        return redirect('/proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor,$id)
    {
        $proveedor = DB::table('proveedors')
                        ->select('*')
                        ->where('id','=',$id)
                        ->first();
        return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update($id, Proveedor $proveedor)
    {
        $proveedor = Proveedor::find($id);
        $proveedor-> nombre_Proveedor = request('nombreProveedor');
        $proveedor-> telefono = request('telefono');
        $proveedor-> celular = request('celular');
        $proveedor-> direccion_proveedor = request('direccion');
        $proveedor-> detalle = request('detalle');
        $proveedor->update();

        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor,$id)
    {
        $almacen=Proveedor::findOrFail($id);
        $almacen->delete();

        return redirect('/proveedores');
    }
}
