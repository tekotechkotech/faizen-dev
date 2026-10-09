<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ServiceFactory extends Factory
{
    public function definition()
    {
        $statuses = ["ACTIVE", "INACTIVE"];

        return [
            "title" => $this->faker->word(2),
            "slug" => Str::slug($this->faker->word . "-" . rand(1, 100)),
            "short_description" => $this->faker->sentence(8),
            "description" => $this->faker->paragraph(3),
            "cover" => $this->faker->imageUrl(400, 300),
            "status" => $this->faker->randomElement($statuses),
        ];
    }
}