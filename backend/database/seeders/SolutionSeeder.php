<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Faizen Biz Starter',
                'slug' => 'faizen-biz-starter',
                'short_description' => 'Paket company profile siap pakai untuk bisnis yang ingin tampil profesional.',
                'description' => 'Masalah: banyak bisnis belum punya wajah digital. Faizen Biz Starter menyediakan struktur company profile (beranda, layanan, kontak) yang tinggal diisi konten bisnismu. Harga: kontak — disesuaikan kebutuhan.',
                'status' => 'AVAILABLE',
                'pricing' => 'Kontak',
                'published_at' => now(),
            ],
            [
                'name' => 'Faizen Invite',
                'slug' => 'faizen-invite',
                'short_description' => 'Modul undangan digital: RSVP, amplop online, galeri.',
                'description' => 'Modul undangan digital turunan dari build Undangan Digital, disiapkan sebagai produk mandiri. Status: segera hadir.',
                'status' => 'COMING_SOON',
                'published_at' => now(),
            ],
        ];

        foreach ($items as $item) {
            Solution::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
