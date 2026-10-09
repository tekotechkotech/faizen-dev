<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Build;
use App\Models\CompanySetting;
use App\Models\Hero;
use App\Models\Inquiry;
use App\Models\Media;
use App\Models\Article;
use App\Models\Service;
use App\Models\Solution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BuildSeeder::class,
            SolutionSeeder::class,
            ServiceSeeder::class,
            ArticleSeeder::class,
            HeroSeeder::class,
            MediaSeeder::class,
            CompanySettingSeeder::class,
        ]);

        $adminPassword = env("ADMIN_PASSWORD", "admin123");
        User::factory()->create([
            "name" => "Admin",
            "email" => "admin@faizenstudio.com",
            "role" => "ADMIN",
            "password" => bcrypt($adminPassword),
        ]);
    }
}