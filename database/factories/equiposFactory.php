<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class equiposFactory extends Factory
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
            'nombre' => $this->faker->randomElement(['Pesas', 'Caminadora', 'Equipo avanzado', 'Equipo basico', 'Aun no identificado']),
            'descripcion' => $this->faker->realText($maxNbChars = 20),
            'unidades' => $this->faker->numberBetween(1, 100),
            'cost_x_renta' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}
