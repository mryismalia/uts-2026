<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Website Sistem Pemesanan Matcha Mey',
            'slug' => 'sistem pemesanan matcha mey',
            'description' => 'Sistem pemesanan online untuk toko matcha mey dengan fitur keranjang belanja dan pembayaran secure.',
            'project_image' => '/images/image.png',
            'tech_stack' => 'Laravel, Livewire, MariaDB, Docker, TailwindCSS',
            'project_url' => 'https://demo.matchamey.com',
            'github_url' => 'https://github.com/username/matchamey',
            'status' => 'completed',
            'progress' => 100,
            'start_date' => '2024-01-01',
            'end_date' => '2024-03-30',
            'is_featured' => true
        ]);


    }
}
