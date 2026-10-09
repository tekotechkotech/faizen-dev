<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class HeroFactory extends Factory
{
    public function definition()
    {
        $types = ["BUILD", "SOLUTION", "CUSTOM"];

        return [
            "type" => $this->faker->randomElement($types),
            "reference_id" => $this->faker->numberBetween(1, 10),
            "title_override" => $this->faker->sentence(5),
            "description_override" => $this->faker->sentence(10),
            "image_override" => $this->faker->imageUrl(800, 600),
            "sort_order" => $this->faker->numberBetween(1, 10),
            "is_active" => $this->faker->boolean,
            "starts_at" => $this->faker->date(),
            "ends_at" => $this->faker->date(),
        ];
    }
}
