<?php

namespace App\Http\Controllers;

use App\Models\LoginCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginClienteController extends Controller
{
    public function index()
    {
        return view('loginCliente.login');
    }

    public function vistaCliente($id)
    {
        $datos =DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->where('orden_trabajos.id',$id)
                    ->first();

        return view('loginCliente.cliente',compact('datos'));
    }

    public function start(Request $request)
    {
        $numero =  $_POST["numero"];
        $contraseña = $_POST["password"];

        $existeUser =DB::table('detalle_clientes')
                    ->join('orden_trabajos','orden_trabajos.id_cliente','detalle_clientes.id_cliente')
                    ->where('valor',$numero)
                    ->where('password',$contraseña)
                    ->exists();
        
        $pass =DB::table('detalle_clientes')
                    ->join('orden_trabajos','orden_trabajos.id_cliente','detalle_clientes.id_cliente')
                    ->select('password')
                    ->where('valor',$numero)
                    ->where('password',$contraseña)
                    ->first();

        $id =DB::table('orden_trabajos')
                    ->select('id')
                    ->where('password',$contraseña)
                    ->first();

        if($existeUser){
            if (strcmp($contraseña, $pass->password) == 0) {
                $value = "/login/cliente/".$id->id;
            }else{
                $value = false;
            }
        }else{
            $value = false;
        }

        return json_encode(array('data'=>$value));
       
    }

    
}
