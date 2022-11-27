<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->Unique()->numberBetween(1,20),
            'proveedor' => $this->faker->name(),
            'fecha' => $this->faker->date(),
            'total' => $this->faker->numberBetween(1,2000),
            'idUsuario' => $this->faker->numberBetween(1,20)
            //
        ];
    }
}
