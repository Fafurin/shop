<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColorProduct>
 */
class ColorProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'color_id' =>  fake()->numberBetween(1, 50),
            'product_id' =>  fake()->numberBetween(1, 33),
        ];
    }
}
