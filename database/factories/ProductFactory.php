<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = Category::inRandomOrder()->value('id');

        return [
            'name' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->optional()->sentence(12),
            'price' => $this->faker->randomFloat(2, 5, 1500),
            'category_id' => $categoryId ?: Category::factory(),
        ];
    }
}
