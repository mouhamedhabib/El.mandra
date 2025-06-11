<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'sub_title' => $this->faker->sentence(6),
            'image' => 'uploaded/sliders/' . $this->faker->image('public/uploaded/sliders', 800, 400, null, false),
        ];
    }
}
