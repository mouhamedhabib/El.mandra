<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;

    public function definition()
    {
        $name = $this->faker->unique()->words(2, true); // مثال: "Fresh Vegetables"
        return [
            'category_id' => Category::inRandomOrder()->first()->id, // افتراض وجود بيانات في categories
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
        ];
    }
}
