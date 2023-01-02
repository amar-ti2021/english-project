<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_id = fake()->numberBetween(1, 20);
        $price = ($product_id <= 5) ? 200000 : (($product_id <= 10) ? 250000 : (($product_id <= 15) ? 150000 : 300000));
        return [
            "product_id" => $product_id,
            "store_id" => fake()->numberBetween(1, 5),
            "employee_id" => fake()->numberBetween(1, 20),
            "sales_type_id" => fake()->numberBetween(1, 2),
            "price" => $price,
            "quantity" => fake()->numberBetween(1, 10)
        ];
    }
}
