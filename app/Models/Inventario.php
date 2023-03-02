<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;

    public function randomColor(){
        $str = "#";
        for($i = 0 ; $i < 6 ; $i++){
        $randNum = rand(0, 15);
        switch ($randNum) {
        case 10: $randNum = "A"; 
        break;
        case 11: $randNum = "B"; 
        break;
        case 12: $randNum = "C"; 
        break;
        case 13: $randNum = "D"; 
        break;
        case 14: $randNum = "E"; 
        break;
        case 15: $randNum = "F"; 
        break; 
        }
        $str .= $randNum;
        }
        return $str;
       }


       public function validarCodigo($codigo){

        $result  = DB::table('inventarios')
                    ->where('codigo','=', $codigo)
                    ->exists();
        return $result;

    }
    
}
