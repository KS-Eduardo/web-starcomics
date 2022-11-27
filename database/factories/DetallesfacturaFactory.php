<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetallesfacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idf' => $this->faker->numberBetween(1,20),
            'idp' => $this->faker->numberBetween(1,20),
            'cantidad' => $this->faker->numberBetween(1,2000)


            //
        ];
    }
}
