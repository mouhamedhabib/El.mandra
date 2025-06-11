<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class MultiImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::pluck('id')->random(),
            'image' => 'uploaded/product/' . $this->faker->image('public/uploaded/product', 800, 800, null, false),
        ];
    }
}
