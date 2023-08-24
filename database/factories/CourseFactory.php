<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->words(3, true),
            'image' => fake()->imageUrl(),
            'content' => fake()->sentences(5, true),
            'price' => fake()->numberBetween(10, 100),
            'hours' => fake()->randomElement([40, 60, 80, 100])





        ];
    }
}
