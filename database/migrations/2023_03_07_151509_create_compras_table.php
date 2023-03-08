<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('id_sucursal')->nullable();
            $table->String('id_almacen')->nullable();
            $table->String('codigo_producto')->nullable();
            $table->String('proveedor')->nullable();
            $table->String('cantidad')->nullable();
            $table->String('unidad')->nullable();
            $table->String('cantidad_unitaria')->nullable();
            $table->String('costo_adquisicion')->nullable();
            $table->String('costo_adquisicion_antiguo')->nullable();
            $table->String('precio_venta')->nullable();
            $table->String('precio_venta_unitario')->nullable();
            $table->String('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
