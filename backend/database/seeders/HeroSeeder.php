<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        $types = ["BUILD", "SOLUTION", "CUSTOM"];

        Hero::factory()->count(2)->create([
            "type" => function () use ($types) {
                return $types[array_rand($types)];
            },
            "is_active" => true,
            "starts_at" => now()->subDays(30),
            "ends_at" => now()->addDays(30),
        ]);
    }
}