<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\movimientos;
class MovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimientos::factory()
        ->count(20)
        ->create();
        //
    }
}
