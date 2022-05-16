<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class claseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(8, 1000000),
            'nombre' => $this->faker->randomElement(['Gimnasia', 'Natacion', 'Entrenamiento de pesas', 'Entrenamiento de pierna', 'Entrenamiento de todo el cuerpo']),
            'imagen' => $this->faker->imageUrl(640,480),
            'descripcion' => $this->faker->realText($maxNbChars = 20),
            'status' =>  $this->faker->randomElement(['activo', 'inactivo'])
        ];
    }
}
