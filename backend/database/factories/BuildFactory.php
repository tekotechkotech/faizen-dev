<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class BuildFactory extends Factory
{
    public function definition()
    {
        $statuses = ["DRAFT", "PUBLISHED", "ARCHIVED"];

        return [
            "title" => $this->faker->sentence(3),
            "slug" => Str::slug($this->faker->word . "-" . rand(1, 100)),
            "short_description" => $this->faker->sentence(10),
            "description" => $this->faker->paragraph(3),
            "thumbnail" => $this->faker->imageUrl(400, 300),
            "cover" => $this->faker->imageUrl(800, 600),
            "status" => $this->faker->randomElement($statuses),
        ];
    }
}
