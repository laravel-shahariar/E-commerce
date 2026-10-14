<?php

namespace Database\Factories;

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
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomNumber(4, true),
            'discount_price' => fake()->randomNumber(3, true),
            'stock' => fake()->randomNumber(2, true),
            'category_id' => random_int(1, 6),
            'brand_id' => random_int(1, 4),
            'size_id' => random_int(1, 5),
            "image" => "p" . rand(1, 6) . ".jpg",
        ];
    }
}
