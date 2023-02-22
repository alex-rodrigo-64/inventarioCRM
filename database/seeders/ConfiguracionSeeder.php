<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //TIPO DE UNIDAD
        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Paquete',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Paquetes',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Rollo',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Hojas',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Hoja',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Bolsa',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Placa',
        ]);

        DB::table('tipo_unidads')->insert([
            'nombre_unidad' => 'Unidad',
        ]);

        //TIPO DE PAGO
        DB::table('tipo_pagos')->insert([
            'nombre_pago' => 'Contado',
        ]);
        DB::table('tipo_pagos')->insert([
            'nombre_pago' => 'Credito',
        ]);

        //DETALLE DE PAGO
        DB::table('tipo_pago_detalles')->insert([
            'pago_detalle' => 'Efectivo',
            'id_tipo_pago' => '1',
        ]);

        DB::table('tipo_pago_detalles')->insert([
            'pago_detalle' => 'QR',
            'id_tipo_pago' => '1',
        ]);

        DB::table('tipo_pago_detalles')->insert([
            'pago_detalle' => 'Cheque',
            'id_tipo_pago' => '1',
        ]);

        DB::table('tipo_pago_detalles')->insert([
            'pago_detalle' => '1 Mes',
            'id_tipo_pago' => '2',
        ]);
    }
}
