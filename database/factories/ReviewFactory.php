<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'rating' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
        ];
    }
}
