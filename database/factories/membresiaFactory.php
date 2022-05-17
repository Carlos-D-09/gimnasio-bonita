<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class membresiaFactory extends Factory
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
            'Nombre' => $this->faker->randomElement(['Principiante', 'Semi-permanente', 'VIP', 'Basico', 'Premium']),
            'Duracion' => $this->faker->numberBetween(10, 1000),
            'costo' => $this->faker->numberBetween(100, 10000)
        ];
    }
}
