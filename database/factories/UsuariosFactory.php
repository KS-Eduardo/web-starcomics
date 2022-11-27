<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoria = ['TOPETE 2323 ENTRE SINALOA Y NAYARIT_tijuana_baja california sur_42477_754321345_no hay'];
        return [

            'direccion' => $categoria[$this->faker->numberBetween(0,0)],
            "edad" =>$this->faker->date(),//
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'correo' => $this->faker->unique()->safeEmail(),
            "tipo" => $this->faker->numberBetween(1,1),
            "token" =>'$2y$10$VUzKkWTllQ5pmgbAYJLlLurVqfn8M4wjS7ldZ8rBtR8i2o4hR6LYG'//
        ];
    }
}
