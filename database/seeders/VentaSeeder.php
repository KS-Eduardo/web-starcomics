<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\venta;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        venta::factory()
        ->count(50)
        ->create();
    }
}
