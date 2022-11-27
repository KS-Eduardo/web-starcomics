<?php

namespace Database\Seeders;

use App\Models\detallesfactura;
use Illuminate\Database\Seeder;

class DetallesfacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        detallesfactura::factory()
        ->count(20)
        ->create();
        //
    }
}
