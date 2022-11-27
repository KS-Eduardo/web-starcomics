<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovimientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idp' => $this->faker->numberBetween(1,20),
            'time' => $this->faker->date(),
            'cantidad' => $this->faker->numberBetween(1,2000),
            'tipo' => $this->faker->numberBetween(1,3),

            //
        ];
    }
}
