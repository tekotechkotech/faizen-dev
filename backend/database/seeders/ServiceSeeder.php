<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ["ACTIVE", "INACTIVE"];

        Service::factory()->count(4)->create([
            "status" => function () use ($statuses) {
                return $statuses[array_rand($statuses)];
            },
        ]);
    }
}