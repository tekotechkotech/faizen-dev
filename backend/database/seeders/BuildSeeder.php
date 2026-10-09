<?php

namespace Database\Seeders;

use App\Models\Build;
use Illuminate\Database\Seeder;

class BuildSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ["DRAFT", "PUBLISHED", "ARCHIVED"];

        Build::factory()->count(3)->create([
            "status" => function () use ($statuses) {
                return $statuses[array_rand($statuses)];
            },
        ]);
    }
}