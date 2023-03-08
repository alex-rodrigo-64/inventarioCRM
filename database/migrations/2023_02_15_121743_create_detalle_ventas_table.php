<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigo')->nullable();
            $table->String('producto')->nullable();
            $table->String('cantidad')->nullable();
            $table->String('unidad')->nullable();
            $table->String('descripcion')->nullable();
            $table->String('precio_unitario')->nullable();
            $table->String('precio_total')->nullable();
            $table->unsignedBigInteger('id_venta')->nullable();
            $table->String('bandera')->nullable();
            $table->timestamps();

            $table->foreign('id_venta')
            ->references('id')
            ->on('ventas')
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
        Schema::dropIfExists('detalle_ventas');
    }
}
