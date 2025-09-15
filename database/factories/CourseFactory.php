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
            'id' => $this->faker->uuid(),
            'title' => $this->faker->text(100),
            'description' => $this->faker->text(200),
            'duration' => $this->faker->randomElement([30, 45, 60, 90, 120]),
            'starts_at' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'created_by' => $this->faker->uuid(),
        ];
    }
}
