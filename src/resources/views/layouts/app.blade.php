<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portfolio - Mery Ismalia')</title>

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Livewire Styles -->
    @livewireStyles

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            scroll-behavior: smooth;
        }

        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.2);
        }

        .progress-bar {
            transition: width 1s ease;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-gradient {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .skill-item:hover .skill-percentage {
            width: var(--percentage);
        }

        .navbar-fixed {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        footer a {
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: #667eea;
            transform: translateX(5px);
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-completed { background: #10b981; color: white; }
        .badge-development { background: #3b82f6; color: white; }
        .badge-planning { background: #f59e0b; color: white; }
        .badge-hold { background: #ef4444; color: white; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav id="navbar" class="bg-white/95 backdrop-blur-md shadow-sm fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent hover:scale-105 transition-transform">
                    Portofolio.
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition font-medium {{ request()->routeIs('home') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition font-medium {{ request()->routeIs('about') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Tentang</a>
                    <a href="{{ route('projects') }}" class="text-gray-700 hover:text-blue-600 transition font-medium {{ request()->routeIs('projects') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Proyek</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition font-medium {{ request()->routeIs('contact') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
            <div class="px-4 py-2 space-y-2">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Beranda</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Tentang</a>
                <a href="{{ route('projects') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Proyek</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="mt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-8 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div data-aos="fade-up">
                    <h3 class="text-xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Portofolio.</h3>
                    <p class="text-gray-400 leading-relaxed">Full Stack Developer yang passionate dalam menciptakan solusi digital berkualitas dan inovatif.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="font-semibold mb-4 text-lg">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-blue-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-blue-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Tentang</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-400 hover:text-blue-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Proyek</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-blue-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Kontak</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="font-semibold mb-4 text-lg">Info Kontak</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center gap-3"><i class="fas fa-envelope w-5 text-blue-400"></i> mery.ismalia@example.com</li>
                        <li class="flex items-center gap-3"><i class="fas fa-phone w-5 text-blue-400"></i> +62 812 3456 7890</li>
                        <li class="flex items-center gap-3"><i class="fas fa-map-marker-alt w-5 text-blue-400"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="font-semibold mb-4 text-lg">Ikuti Saya</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600 transition-all hover:scale-110"><i class="fab fa-github"></i></a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600 transition-all hover:scale-110"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600 transition-all hover:scale-110"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-600 transition-all hover:scale-110"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Portofolio. All rights reserved. | Dibangun dengan Laravel, Filament & TailwindCSS</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });
    </script>

    @livewireScripts
</body>
</html>
