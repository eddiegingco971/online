<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

           'title'=> fake()->title(),
           'image'=> fake()->image(),
           'description'=> fake()->sentence(),
           'link'=> fake()->randomElement(['https://www.facebook.com', 'http://www.example.com']),
           'button_name'=> fake()->randomElement(['Follow us', 'Click here!']),
           'status' => fake()->randomElement(['active','inactive']),

        ];
    }
}
