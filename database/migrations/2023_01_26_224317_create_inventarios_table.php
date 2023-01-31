<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->String('nombre_producto')->nullable();
            $table->String('cantidad')->nullable();
            $table->String('costo_adquisicion')->nullable();
            $table->String('costo_venta')->nullable(); 
            $table->String('fecha')->nullable();
            $table->String('proveedor')->nullable();
            $table->String('detale')->nullable();
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
        Schema::dropIfExists('inventarios');
    }
}
