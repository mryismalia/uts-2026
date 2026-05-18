<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Sistem Manajemen Sekolah',
            'slug' => 'sistem-manajemen-sekolah',
            'description' => 'Sistem informasi manajemen sekolah lengkap dengan modul siswa, guru, kelas, nilai, dan pembayaran.',
            'image_url' => '/images/projects/school-management.jpg',
            'tech_stack' => 'Laravel, Livewire, MySQL, TailwindCSS',
            'project_url' => 'https://demo.school.com',
            'github_url' => 'https://github.com/username/school-management',
            'status' => 'completed',
            'progress' => 100,
            'start_date' => '2024-01-01',
            'end_date' => '2024-03-30',
            'is_featured' => true
        ]);

        Project::create([
            'title' => 'E-Commerce Platform',
            'slug' => 'e-commerce-platform',
            'description' => 'Platform e-commerce modern dengan payment gateway, manajemen produk, dan sistem keranjang belanja real-time.',
            'image_url' => '/images/projects/ecommerce.jpg',
            'tech_stack' => 'Laravel, Livewire, MySQL, Midtrans',
            'github_url' => 'https://github.com/username/ecommerce',
            'status' => 'development',
            'progress' => 75,
            'start_date' => '2024-02-01',
            'is_featured' => true
        ]);

        Project::create([
            'title' => 'Aplikasi POS Restoran',
            'slug' => 'aplikasi-pos-restoran',
            'description' => 'Point of Sale system untuk restoran dengan manajemen meja, menu, dan laporan penjualan.',
            'image_url' => '/images/projects/pos.jpg',
            'tech_stack' => 'Laravel, Livewire, MySQL, Bootstrap',
            'project_url' => 'https://demo.pos.com',
            'status' => 'completed',
            'progress' => 100,
            'start_date' => '2023-10-01',
            'end_date' => '2023-12-20',
            'is_featured' => false
        ]);

        Project::create([
            'title' => 'API Mobile App',
            'slug' => 'api-mobile-app',
            'description' => 'RESTful API untuk aplikasi mobile dengan autentikasi JWT dan dokumentasi lengkap menggunakan Laravel Sanctum.',
            'image_url' => '/images/projects/api.jpg',
            'tech_stack' => 'Laravel, MySQL, JWT, Postman',
            'github_url' => 'https://github.com/username/mobile-api',
            'status' => 'development',
            'progress' => 60,
            'start_date' => '2024-03-01',
            'is_featured' => false
        ]);

        Project::create([
            'title' => 'Dashboard Analytics',
            'slug' => 'dashboard-analytics',
            'description' => 'Dashboard analytics real-time dengan berbagai chart dan grafik untuk monitoring data bisnis.',
            'image_url' => '/images/projects/dashboard.jpg',
            'tech_stack' => 'Laravel, Livewire, Chart.js, TailwindCSS',
            'project_url' => 'https://demo.dashboard.com',
            'github_url' => 'https://github.com/username/dashboard',
            'status' => 'planning',
            'progress' => 20,
            'start_date' => '2024-04-01',
            'is_featured' => false
        ]);
    }
}
