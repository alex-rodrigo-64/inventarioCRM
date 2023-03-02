<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:ver almacenes|crear almacen|editar almacen|borrar almacen',['only'=>['index']]);
        $this->middleware('permission:crear almacen',['only'=>['create','store']]);
        $this->middleware('permission:editar almacen',['only'=>['edit','update']]);
        $this->middleware('permission:borrar almacen',['only'=>['destroy']]);
    }

    public function index()
    {
        $almacen = DB::table('almacens')
                ->select('*')
                ->paginate(25);

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
        $almacen-> direccion_almacen = $request->get('direccion');
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

            $sucursal_elegida = DB::table('almacens')
                        ->join('sucursals','almacens.id_sucursal','=','sucursals.id')
                        ->select('*')
                        ->where('almacens.id_sucursal','=',$id)
                        ->first();

            $sucursal = DB::table('sucursals')
                        ->select('*')
                        ->get();

                       // dd($sucursal_elegida);
                return view('almacen.edit',compact('sucursal_elegida','sucursal'));

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
    public function update($id)
    {
        $almacen = Almacen::find($id);
        $almacen-> nombre_almacen = request('nombreAlmacen');
        $almacen-> id_sucursal = request('sucursal');
        $almacen-> direccion_almacen = request('direccion');
        $almacen->update();

        return redirect('/almacenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $almacen=Almacen::findOrFail($id);
        $almacen->delete();

        return redirect('/almacenes');
    }
}
