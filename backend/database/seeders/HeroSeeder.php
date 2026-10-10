<?php

namespace Database\Seeders;

use App\Models\Build;
use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::query()->delete();

        $build = Build::where('slug', 'sistem-ppdb-smk')->first();
        $slides = [
            [
                'type' => 'BUILD',
                'reference_id' => $build?->id,
                'title_override' => 'Sistem PPDB SMK',
                'description_override' => 'Pendaftaran online yang rapi dan transparan.',
                'image_override' => null,
                'sort_order' => 0,
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addDays(90),
            ],
            [
                'type' => 'CUSTOM',
                'reference_id' => null,
                'title_override' => 'Punya ide? Bangun bersama kami.',
                'description_override' => 'Ceritakan kebutuhanmu — kita wujudkan bersama.',
                'image_override' => null,
                'sort_order' => 1,
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addDays(90),
            ],
        ];

        foreach ($slides as $slide) {
            Hero::create($slide);
        }
    }
}
