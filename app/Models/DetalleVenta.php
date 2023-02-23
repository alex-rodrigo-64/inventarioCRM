<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = "detalle_ventas";
    protected $fillable = [
        'codigo','cantidad','unidad','detalle','serial','precio_unitario','precio_total','id_venta','bandera',
    ];
}
