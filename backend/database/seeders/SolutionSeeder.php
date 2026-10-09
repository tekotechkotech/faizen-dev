<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ["DRAFT", "COMING_SOON", "BETA", "AVAILABLE", "ARCHIVED"];

        Solution::factory()->count(2)->create([
            "status" => function () use ($statuses) {
                return $statuses[array_rand($statuses)];
            },
        ]);
    }
}