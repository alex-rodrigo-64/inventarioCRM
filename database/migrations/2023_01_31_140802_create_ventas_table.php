<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sucursal')->nullable();
            $table->unsignedBigInteger('id_almacen')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->String('tipo_pago')->nullable();
            $table->String('detalle_pago')->nullable();
            $table->String('detalle')->nullable();
            $table->String('bandera')->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');

            $table->foreign('id_sucursal')
            ->references('id')
            ->on('sucursals')
            ->onDelete('cascade');

            $table->foreign('id_almacen')
            ->references('id')
            ->on('almacens')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
