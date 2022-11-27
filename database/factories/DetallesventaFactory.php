<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetallesventaFactory extends Factory
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
            'idp' => $this->faker->numberBetween(1,50)
        ];
    }
}
