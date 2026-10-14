<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Product::create([
            'name' => $faker->sentence(),
            'description' => Str::Random(300),
            'price' => random_int(100, 9999),
            'discount_price' => random_int(100, 999),
            'stock' => random_int(0, 100),
            'category_id' => random_int(1, 6),
            'brand_id' => random_int(1, 4),
            'size_id' => random_int(1, 5),
            "image" => "p" . rand(1, 6) . ".jpg",
        ]);
    }
}
