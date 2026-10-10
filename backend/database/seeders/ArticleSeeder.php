<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Kenapa HTML-first untuk website company profile',
                'slug' => 'html-first-untuk-company-profile',
                'excerpt' => 'Konten tampil tanpa JavaScript: cepat, SEO-friendly, dan awet.',
                'content' => 'Website company profile pada dasarnya adalah dokumen: dibaca, bukan dimainkan. Dengan HTML-first, konten inti dirender server sehingga langsung tampil dan mudah dirayapi mesin pencari. JavaScript hanya mempercantik interaksi (carousel, form) tanpa menjadi syarat tampilnya konten.',
                'category' => 'Technical',
                'author' => 'Faizen Studio',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
            [
                'title' => 'Dari Build menjadi Solution',
                'slug' => 'dari-build-menjadi-solution',
                'excerpt' => 'Proyek client yang bagus bisa dipanen menjadi produk yang dipakai banyak orang.',
                'content' => 'Setiap build menyimpan pola yang berulang. Undangan Digital lahir dari satu kebutuhan, lalu digeneralisasi menjadi modul Faizen Invite. Kuncinya: pisahkan yang generik dari yang spesifik sejak awal, dan dengarkan permintaan yang muncul dua kali.',
                'category' => 'Product',
                'author' => 'Faizen Studio',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
            [
                'title' => 'Formulir inquiry yang tidak bikin kabur',
                'slug' => 'formulir-inquiry-tidak-bikin-kabur',
                'excerpt' => 'Tiga kolom, satu tujuan: memulai percakapan.',
                'content' => 'Setiap kolom tambahan menurunkan konversi. Formulir kami hanya meminta nama, kontak, dan cerita kebutuhan — plus pilihan intent agar pesan masuk ke jalur yang tepat. Gesekan rendah, niat tetap jelas.',
                'category' => 'Business',
                'author' => 'Faizen Studio',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
        ];

        foreach ($items as $item) {
            Article::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
