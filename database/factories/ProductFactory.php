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
        $product_type = ['novel', 'comic', 'textbook'];
        return [
            "product_name" => fake()->words(fake()->numberBetween(2, 5), true),
            "product_type" => $product_type[fake()->numberBetween(0, 2)]
        ];
    }
}
