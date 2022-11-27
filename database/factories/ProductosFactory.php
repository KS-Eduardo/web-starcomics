<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoria = ['Comic','Manga','Figura'];
        $portada = ['img/gevJp9JZSmntAq27XGkZRgjCiHc9AFyeLvfyoIKP.jpg','img/sFYwlXBUJjaZS2xqSeJsrhWP1lkXeEBxTJA3TgxN.jpg','img/RcBfSXEK1izgMHH3IsuJ9a3iqzpfjMKb9yLJL5HM.jpg','img/eOx2Cu2qIwyLfZlgKxxwwbfmqid43NsjYxMMe6Ih.jpg','img/rgvE7hz6oExR9IHnRARcRwec6zICbqG87VGEzzh3.jpg'];

        $genero= ['comedia','accion','terror','romance','figura','aventura','fantasia','mecha'];

        return [
            //
                       // "id" => $this->faker->numberBetween(1,10),//
                       "nombre"=>$this->faker->words(3,true),
                       "autor"=>$this->faker->name(),
                       "portada"=>$portada[$this->faker->numberBetween(0,4)],
                       "categoria"=>$categoria[$this->faker->numberBetween(0,2)],
                       "genero"=>$genero[$this->faker->numberBetween(0,7)],
                       "codigo" => $this->faker->numberBetween(1000,10000),
                       "cantidad" => $this->faker->numberBetween(1,1000),////
                       "precio" => $this->faker->numberBetween(1,1200),//
                       "sinopsis"=> $this->faker->sentence(),
                       "estado" => $this->faker->numberBetween(1,1)//

        ];
    }
}
