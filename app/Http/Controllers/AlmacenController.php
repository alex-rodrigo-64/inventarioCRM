<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacen = DB::table('almacens')
                ->select('*')
                ->get();

        return view('almacen.index', compact('almacen'));
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

        return view('almacen.create',compact('sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Almacen();

        $almacen-> nombre_almacen = $request->get('nombreAlmacen');
        $almacen-> id_sucursal = $request->get('sucursal');
        $almacen-> direccion = $request->get('direccion');
        $almacen-> save();

        return redirect('/almacenes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            
            $almacenes_elegidos = DB::table('almacens')
                        ->select('*')
                        ->where('id','=', $id)
                        ->first();

            $sucursal_elegida = DB::table('almacens')
                        ->join('sucursals','almacens.id_sucursal','=','sucursals.id')
                        ->select('*')
                        ->where('sucursals.id','=',$id)
                        ->first();

            $sucursal = DB::table('sucursals')
                        ->select('*')
                        ->get();

                return view('almacen.edit',compact('almacenes_elegidos','sucursal_elegida','sucursal'));

        } catch (\Throwable $th) {

            return view('errors.errorEditarAlmacen');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        //
    }
}
