<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Custom Software', 'slug' => 'custom-software', 'short_description' => 'Bangun aplikasi sesuai kebutuhan unikmu, dari ide hingga produksi.', 'description' => 'Kami merancang dan membangun perangkat lunak khusus: portal, dashboard, aplikasi operasional. Kamu bawa masalah, kita bangun solusinya bersama.', 'status' => 'ACTIVE'],
            ['title' => 'System Development', 'slug' => 'system-development', 'short_description' => 'Pengembangan sistem informasi end-to-end yang rapi dan terdokumentasi.', 'description' => 'Analisis kebutuhan, desain sistem, implementasi, hingga serah terima. Fokus pada sistem yang mudah dirawat.', 'status' => 'ACTIVE'],
            ['title' => 'API Integration', 'slug' => 'api-integration', 'short_description' => 'Sambungkan sistemmu dengan layanan pihak ketiga: pembayaran, WhatsApp, dan lainnya.', 'description' => 'Integrasi API yang andal dengan penanganan error, retry, dan logging yang jelas.', 'status' => 'ACTIVE'],
            ['title' => 'Maintenance', 'slug' => 'maintenance', 'short_description' => 'Rawat dan kembangkan sistem yang sudah berjalan.', 'description' => 'Pemeliharaan rutin, perbaikan bug, dan peningkatan bertahap agar sistem tetap sehat.', 'status' => 'ACTIVE'],
        ];

        foreach ($items as $item) {
            Service::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
