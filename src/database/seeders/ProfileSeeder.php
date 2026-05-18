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
            'title' => 'Full Stack Developer',
            'short_bio' => 'Full Stack Developer dengan pengalaman 3+ tahun dalam pengembangan web',
            'bio' => 'Saya adalah seorang Full Stack Developer yang passionate dalam membangun aplikasi web modern, scalable, dan user-friendly. Berpengalaman dalam Laravel, Livewire, dan berbagai teknologi terkini.',
            'email' => 'meryismalia@gmail.com',
            'phone' => '+62 896 3720 7719',
            'address' => 'Tangerang, Indonesia',
            'profile_image' => '/images/profile.jpg',
            'github_url' => 'https://github.com/meryismalia',
            'linkedin_url' => 'https://linkedin.com/in/meryismalia',
            'twitter_url' => 'https://twitter.com/meryismalia',
            'experience' => '[
                {
                    "position": "Senior Full Stack Developer",
                    "company": "Tech Solutions Indonesia",
                    "period": "2022 - Sekarang",
                    "description": "Mengembangkan aplikasi enterprise menggunakan Laravel dan Livewire"
                },
                {
                    "position": "Web Developer",
                    "company": "Digital Agency Creative",
                    "period": "2020 - 2022",
                    "description": "Membangun berbagai website untuk client dari berbagai industri"
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
