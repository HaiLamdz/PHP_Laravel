<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'image' => null,
            'view' => $this->faker->numberBetween(0, 1000),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean()
        ];
    }
}
