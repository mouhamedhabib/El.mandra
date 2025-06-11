<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'slug' => $this->faker->slug(),
            'image' => 'default-brand.png', 
        ];
    }
}
