<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedidos;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pedidos::factory()
        ->count(50)
        ->create();
    }
}
