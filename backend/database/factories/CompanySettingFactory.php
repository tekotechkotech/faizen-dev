<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CompanySettingFactory extends Factory
{
    public function definition()
    {
        $whatsapp = "+62" . rand(8000000000, 8999999999);
        return [
            "company_name" => "Faizen Studio",
            "tagline" => $this->faker->sentence(5),
            "description" => $this->faker->paragraph(3),
            "logo" => $this->faker->imageUrl(400, 200),
            "favicon" => $this->faker->imageUrl(64, 64),
            "email" => "info@faizenstudio.com",
            "phone_whatsapp" => $whatsapp,
            "address" => $this->faker->streetAddress,
            "socials" => json_encode([
                "twitter" => $this->faker->twitter,
                "linkedin" => $this->faker->linkedin,
                "github" => $this->faker->github,
            ]),
        ];
    }
}
