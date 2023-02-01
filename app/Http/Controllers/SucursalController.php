<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursal = DB::table('sucursals')
                ->select('*')
                ->paginate(25);

        return view('sucursal.index', compact('sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal();

        $sucursal-> nombre_sucursal = $request->get('nombreSucursal');
        $sucursal-> nombre_propietario = $request->get('nombrePropietario');
        $sucursal-> direccion_sucursal = $request->get('direccion');
        $sucursal-> save();

        return redirect('/sucursales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $sucursal = Sucursal::find($id);
            $sucursal_elegida = DB::table('sucursals')
                    ->select('*')
                    ->first();

            return view('sucursal.edit',compact('sucursal_elegida'));

        } catch (\Throwable $th) {
            return view('errors.errorEditarAlmacen');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->nombre_sucursal = request('nombreSucursal');
        $sucursal->nombre_propietario = request('nombrePropietario');
        $sucursal->direccion_sucursal = request('direccion');
        $sucursal->update();

        return redirect('/sucursales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal=Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect('/sucursales');
    }
}
