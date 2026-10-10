<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['filename' => 'ppdb-dashboard.png', 'path' => 'media/ppdb-dashboard.png', 'mime_type' => 'image/png', 'size' => 184320, 'width' => 1280, 'height' => 800, 'alt' => 'Tangkapan layar dashboard Sistem PPDB SMK'],
            ['filename' => 'ppdb-formulir.png', 'path' => 'media/ppdb-formulir.png', 'mime_type' => 'image/png', 'size' => 142080, 'width' => 1280, 'height' => 800, 'alt' => 'Tangkapan layar formulir pendaftaran PPDB'],
            ['filename' => 'gocap-kas.jpg', 'path' => 'media/gocap-kas.jpg', 'mime_type' => 'image/jpeg', 'size' => 96256, 'width' => 1080, 'height' => 1350, 'alt' => 'Tampilan pencatatan kas aplikasi NU Gocap'],
            ['filename' => 'gocap-laporan.jpg', 'path' => 'media/gocap-laporan.jpg', 'mime_type' => 'image/jpeg', 'size' => 88192, 'width' => 1080, 'height' => 1350, 'alt' => 'Tampilan laporan harian aplikasi NU Gocap'],
            ['filename' => 'undangan-rsvp.png', 'path' => 'media/undangan-rsvp.png', 'mime_type' => 'image/png', 'size' => 120448, 'width' => 768, 'height' => 1024, 'alt' => 'Tampilan RSVP undangan digital'],
            ['filename' => 'biz-starter-beranda.webp', 'path' => 'media/biz-starter-beranda.webp', 'mime_type' => 'image/webp', 'size' => 65536, 'width' => 1280, 'height' => 800, 'alt' => 'Tampilan beranda Faizen Biz Starter'],
            ['filename' => 'tim-faizen.jpg', 'path' => 'media/tim-faizen.jpg', 'mime_type' => 'image/jpeg', 'size' => 110592, 'width' => 1200, 'height' => 800, 'alt' => 'Foto tim Faizen Studio'],
            ['filename' => 'profil-perusahaan.pdf', 'path' => 'media/profil-perusahaan.pdf', 'mime_type' => 'application/pdf', 'size' => 245760, 'width' => null, 'height' => null, 'alt' => 'Dokumen profil perusahaan Faizen Studio'],
        ];

        foreach ($items as $item) {
            Media::updateOrCreate(['path' => $item['path']], $item);
        }
    }
}
