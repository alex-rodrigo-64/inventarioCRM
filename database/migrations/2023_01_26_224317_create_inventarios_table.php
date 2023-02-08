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
            $table->String('codigo')->nullable();
            $table->String('nombre_producto')->nullable();
            $table->String('proveedor')->nullable();
            $table->String('cantidad')->nullable();
            $table->String('unidad')->nullable();
            $table->String('cantidad_unitaria')->nullable();
            $table->String('cantidad_unitaria_total')->nullable();
            $table->String('costo_adquisicion')->nullable();
            $table->String('precio_venta')->nullable(); 
            $table->String('precio_venta_unitario')->nullable(); 
            $table->String('detalle')->nullable();
            $table->unsignedBigInteger('id_sucursal')->nullable();
            $table->unsignedBigInteger('id_almacen')->nullable();
            
            $table->timestamps();

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
        Schema::dropIfExists('inventarios');
    }
}
