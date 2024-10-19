<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'caracteristica' => fake()->sentence(),
            'descripcion' => fake()->sentence(),
            'registro_sanitario' => fake()->word(),
            'condicion_almacenamiento' => fake()->word(),
            'precio' => fake()->randomFloat(1, 1, 150),
            'stock' => fake()->numberBetween(0,200),
        ];
    }
}
