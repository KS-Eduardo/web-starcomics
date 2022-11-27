<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\productos;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        productos::factory()
        ->count(50)
        ->create();
    }
}
