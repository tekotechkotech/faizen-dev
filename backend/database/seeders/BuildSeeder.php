<?php

namespace Database\Seeders;

use App\Models\Build;
use Illuminate\Database\Seeder;

class BuildSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Sistem PPDB SMK',
                'slug' => 'sistem-ppdb-smk',
                'short_description' => 'Penerimaan peserta didik baru online: formulir, verifikasi berkas, dan pengumuman.',
                'description' => 'Masalah: pendaftaran manual menumpuk berkas dan sulit dilacak. Solusi: portal PPDB dengan alur verifikasi dan pengumuman transparan. Fitur utama: formulir online, unggah berkas, dashboard verifikasi, pengumuman kelulusan. Hasil: proses seleksi terdokumentasi dan mudah diaudit.',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
            [
                'title' => 'Aplikasi Operasional NU Gocap',
                'slug' => 'nu-gocap-app',
                'short_description' => 'Aplikasi operasional harian: kas, stok, dan laporan dalam satu genggaman.',
                'description' => 'Masalah: pencatatan manual tersebar di buku dan chat. Solusi: aplikasi operasional terpadu. Fitur utama: kas masuk-keluar, stok barang, laporan harian. Kini dipakai harian dan terus disempurnakan.',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
            [
                'title' => 'Undangan Digital',
                'slug' => 'undangan-digital',
                'short_description' => 'Undangan pernikahan digital: RSVP, amplop online, dan galeri.',
                'description' => 'Masalah: undangan cetak mahal dan sulit didata. Solusi: halaman undangan digital responsif. Fitur utama: RSVP, ucapan, amplop digital, galeri foto. Hasil: konfirmasi kehadiran tercatat rapi.',
                'status' => 'PUBLISHED',
                'published_at' => now(),
            ],
        ];

        foreach ($items as $item) {
            Build::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
