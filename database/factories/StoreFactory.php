<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'store_address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'region' => fake()->city(),
            'state' => fake()->state(),
            'country' => fake()->country()
        ];
    }
}
