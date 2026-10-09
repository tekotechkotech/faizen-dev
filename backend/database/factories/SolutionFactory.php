<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class SolutionFactory extends Factory
{
    public function definition()
    {
        $statuses = ["DRAFT", "COMING_SOON", "BETA", "AVAILABLE", "ARCHIVED"];

        return [
            "name" => $this->faker->company,
            "slug" => Str::slug($this->faker->word . "-" . rand(1, 100)),
            "short_description" => $this->faker->sentence(8),
            "description" => $this->faker->paragraph(3),
            "logo" => $this->faker->imageUrl(200, 200),
            "thumbnail" => $this->faker->imageUrl(400, 300),
            "cover" => $this->faker->imageUrl(800, 600),
            "status" => $this->faker->randomElement($statuses),
            "pricing" => $this->faker->randomElement([null, "contact", rand(500, 5000)]),
            "url" => $this->faker->url,
        ];
    }
}