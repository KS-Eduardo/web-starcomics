<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call([
            UsuariosSeeder::class,
            ProductosSeeder::class,
            CarritoSeeder::class,
            VentaSeeder::class,
            HistorialSeeder::class,
            PedidosSeeder::class,
            DetallesventaSeeder::class,
            DeseosSeeder::class,
            FacturaSeeder::class,
            MovimientosSeeder::class,
            DetallesfacturaSeeder::class
        ]);
    }
}
