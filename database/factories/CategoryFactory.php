<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Food', 'Transportation', 'Shopping', 'Entertainment', 'Health', 'Education', 'Others']),
            'type' => $this->faker->randomElement(['Income', 'Expense']),
        ];
    }
}
