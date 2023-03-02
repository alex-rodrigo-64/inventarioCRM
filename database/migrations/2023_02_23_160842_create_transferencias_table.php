<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('id_origen')->nullable();
            $table->String('id_almacen')->nullable();
            $table->String('id_destino')->nullable();
            $table->String('nombre_producto')->nullable();
            $table->String('cantidad')->nullable();
            $table->String('unidad')->nullable();
            $table->String('detalle')->nullable();
            $table->String('estado')->nullable();
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
        Schema::dropIfExists('transferencias');
    }
}
