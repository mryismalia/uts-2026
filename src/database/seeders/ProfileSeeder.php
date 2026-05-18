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
            'email' => 'mery.ismalia@example.com',
            'phone' => '+62 812 3456 7890',
            'address' => 'Jakarta, Indonesia',
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
                    "degree": "S1 Teknik Informatika",
                    "university": "Universitas Indonesia",
                    "year": "2016 - 2020",
                    "description": "IPK 3.8, fokus pada pengembangan web dan database"
                }
            ]',
            'is_active' => true
        ]);
    }
}
