<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarritoFactory extends Factory
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
            'idu' => $this->faker->numberBetween(1,20),
            'idp' => $this->faker->numberBetween(1,50)
        ];
    }
}
