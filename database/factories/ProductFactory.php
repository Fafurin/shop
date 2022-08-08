<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'number' => fake()->swiftBicNumber(),
            'description' => fake()->paragraphs(2, true),
            'content' => fake()->paragraphs(5, true),
            'preview_image' => 'https://source.unsplash.com/user/c_v_r/100x100',
            'price' => fake()->randomFloat(2, 99, 9999),
            'count' => fake()->numberBetween(0, 100),
            'is_published' => fake()->boolean(),
            'category_id' => fake()->numberBetween(1, 20),
        ];
    }
}
