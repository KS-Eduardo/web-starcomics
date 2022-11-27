<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\carrito;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                //
                Carrito::factory()
                ->count(50)
                ->create();
    }
}
