<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // \App\Models\User::factory(10)->create();
        Permission::create([
            'name' => 'dashboard',
            'tipo' => 'dashboard',
        ]);
        Permission::create([
            'name' => 'ver roles',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'crear rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'editar rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'borrar rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'ver usuarios',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'crear usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'editar usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'borrar usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'ver sucursales',
            'tipo' => 'sucursal',
        ]);
        Permission::create([
            'name' => 'crear sucursal',
            'tipo' => 'sucursal',
        ]);
        Permission::create([
            'name' => 'editar sucursal',
            'tipo' => 'sucursal',
        ]);
        Permission::create([
            'name' => 'borrar sucursal',
            'tipo' => 'sucursal',
        ]);
        Permission::create([
            'name' => 'ver almacenes',
            'tipo' => 'almacen',
        ]);
        Permission::create([
            'name' => 'crear almacen',
            'tipo' => 'almacen',
        ]);
        Permission::create([
            'name' => 'editar almacen',
            'tipo' => 'almacen',
        ]);
        Permission::create([
            'name' => 'borrar almacen',
            'tipo' => 'almacen',
        ]);
        Permission::create([
            'name' => 'ver inventarios',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'crear inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'editar inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'borrar inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'ver clientes',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'crear cliente',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'editar cliente',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'borrar cliente',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'ver ventas',
            'tipo' => 'venta',
        ]);
        Permission::create([
            'name' => 'crear venta',
            'tipo' => 'venta',
        ]);
        Permission::create([
            'name' => 'editar venta',
            'tipo' => 'venta',
        ]);
        Permission::create([
            'name' => 'borrar venta',
            'tipo' => 'venta',
        ]);
        Permission::create([
            'name' => 'ver reportes',
            'tipo' => 'reporte',
        ]);
        Permission::create([
            'name' => 'crear reporte',
            'tipo' => 'reporte',
        ]);
        Permission::create([
            'name' => 'borrar reporte',
            'tipo' => 'reporte',
        ]);
        Permission::create([
            'name' => 'ver transferencias',
            'tipo' => 'transferencia',
        ]);
        Permission::create([
            'name' => 'crear transferencia',
            'tipo' => 'transferencia',
        ]);
        Permission::create([
            'name' => 'editar transferencia',
            'tipo' => 'transferencia',
        ]);
        Permission::create([
            'name' => 'borrar transferencia',
            'tipo' => 'transferencia',
        ]);
        
        
        
        $role = Role::create(['name' => 'ADMINISTRADOR']);
        $role->givePermissionTo(Permission::all());
           
        $user = User::create([
            'name' => 'Administrador',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $user->assignRole('ADMINISTRADOR');

        $this->call(ConfiguracionSeeder::class);
    }
}
