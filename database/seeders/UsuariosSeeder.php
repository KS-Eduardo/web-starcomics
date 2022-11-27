<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Usuarios::factory()
        ->count(20)
        ->create();
    }
}
