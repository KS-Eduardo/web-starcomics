<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'idVenta' => $this->faker->numberBetween(1,50),
            'idUsuario' => $this->faker->numberBetween(1,20)
        ];
    }
}
