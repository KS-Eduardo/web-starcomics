<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosFactory extends Factory
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
            'idUsuario' => $this->faker->numberBetween(1,20),
            'idVenta' => $this->faker->numberBetween(1,50),
            'idProducto' => $this->faker->numberBetween(1,50)
        ];
    }
}
