<?php

namespace Database\Seeders;

use App\Models\MultiImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultiImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MultiImage::factory()->count(50)->create();
    }
}
