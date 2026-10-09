<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ["Technical", "Business", "Product", "Insight"];
        $statuses = ["DRAFT", "PUBLISHED", "ARCHIVED"];

        Article::factory()->count(3)->create([
            "category" => function () use ($categories) {
                return $categories[array_rand($categories)];
            },
            "status" => function () use ($statuses) {
                return $statuses[array_rand($statuses)];
            },
        ]);
    }
}