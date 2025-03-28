<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->userName(),
            'age' => $this->faker->numberBetween(18, 60),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'gender' => $this->faker->randomElement(['Nam', 'Nữ']),
            'status' => $this->faker->boolean(),
        ];
    }
}
