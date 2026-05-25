<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'full_name' => 'Mery Ismalia',
            'title' => 'Junior Full Stack Developer',
            'short_bio' => 'Informatics Student (4th Sem) & Full Stack Developer. Created "Matcha Mey" POS & campus web apps. Skilled in UI & backend databases.',
            'bio' => 'Saya adalah seorang Junior Full Stack Developer yang passionate dalam membangun aplikasi web modern, scalable, dan user-friendly. Berpengalaman dalam Laravel, Livewire, dan berbagai teknologi terkini.',
            'email' => 'meryismalia@gmail.com',
            'phone' => '+62 896 3720 7719',
            'address' => 'Tangerang, Indonesia',
            'profile_image' => '/images/profile.jpg',
            'github_url' => 'https://github.com/meryismalia',
            'experience' => '[
                {
                    "position": "Sistem Analis & Tester",
                    "project": "Sistem Peminjaman Fasilitas Kampus",
                    "period": "2026 - Sekarang",
                    "description": "Menangani analisis kebutuhan, pengujian, dan dokumentasi untuk sistem peminjaman fasilitas kampus yang digunakan oleh mahasiswa dan staf."
                }

            ]',
                'education' => '[
                {
                    "degree": "Mahasiswa Teknik Informatika",
                    "university": "Universitas Esa Unggul",
                    "year": "2024 - Sekarang",
                    "description": "fokus pada pengembangan web dan database"
                }
            ]',
            'is_active' => true
        ]);
    }
}
