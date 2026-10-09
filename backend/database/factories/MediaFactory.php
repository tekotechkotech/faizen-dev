<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class MediaFactory extends Factory
{
    public function definition()
    {
        $mimeTypes = ["image/jpeg", "image/png", "image/gif", "application/pdf"];

        return [
            "filename" => $this->faker->word . "." . $this->faker->randomElement(["jpg", "png", "gif", "pdf"]),
            "path" => $this->faker->bothify("media/img_####.jpg"),
            "mime_type" => $this->faker->randomElement($mimeTypes),
            "size" => $this->faker->numberBetween(1000, 5000000),
            "width" => $this->faker->numberBetween(400, 4000),
            "height" => $this->faker->numberBetween(300, 3000),
            "alt" => $this->faker->sentence(4),
        ];
    }
}
