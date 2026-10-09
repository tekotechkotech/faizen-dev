<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $categories = ["Technical", "Business", "Product", "Insight"];
        $statuses = ["DRAFT", "PUBLISHED", "ARCHIVED"];

        return [
            "title" => $this->faker->sentence(4),
            "slug" => Str::slug($this->faker->word . "-" . rand(1, 100)),
            "excerpt" => $this->faker->sentence(20),
            "cover" => $this->faker->imageUrl(800, 600),
            "content" => $this->faker->paragraph(10),
            "category" => $this->faker->randomElement($categories),
            "author" => $this->faker->name,
            "status" => $this->faker->randomElement($statuses),
        ];
    }
}