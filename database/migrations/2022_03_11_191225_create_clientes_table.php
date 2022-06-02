<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreCliente')->nullable();
            $table->string('vat')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('apt')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('pak')->nullable();
            $table->string('nombreCiudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('idioma')->nullable();
            $table->string('tipo')->nullable();
            $table->string('valor')->nullable();
            $table->text('nota')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}