<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        CompanySetting::firstOrCreate(
            [],
            [
                "company_name" => "Faizen Studio",
                "tagline" => "Building digital dreams together",
                "description" => "We craft custom software solutions for startups and enterprises.",
                "logo" => null,
                "favicon" => null,
                "email" => "info@faizenstudio.com",
                "phone_whatsapp" => "+628123456789",
                "address" => "Jakarta, Indonesia",
                "socials" => json_encode([
                    "twitter" => "@faizen_studio",
                    "linkedin" => "faizen-studio",
                    "github" => "faizen-studio",
                ]),
            ]
        );
    }
}