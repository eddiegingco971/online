<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
            'product_photo' => fake()->image(),
            'category_id' => fake()->randomElement(['1', '2', '3', '4', '5','6','7','8','9','10']),
            'product_name' => fake()->name(),
            'description' => fake()->sentence(),
            'price' => fake()->randomElement(['50', '100', '50', '80', '100']),
            'status' => fake()->randomElement(['active','inactive']),
        ];
    }
}
