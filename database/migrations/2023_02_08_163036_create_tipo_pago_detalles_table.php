<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPagoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pago_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('pago_detalle')->nullable();
            $table->unsignedBigInteger('id_tipo_pago')->nullable();
            $table->timestamps();

            $table->foreign('id_tipo_pago')
            ->references('id')
            ->on('tipo_pagos')
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
        Schema::dropIfExists('tipo_pago_detalles');
    }
}
