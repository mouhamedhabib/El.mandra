<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'url' => $this->faker->url(),
            'image' => 'default-banner.jpg', 
        ];
    }
}
