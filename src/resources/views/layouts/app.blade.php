<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portfolio - Mery Ismalia')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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

        /* 💗 PINK THEME */
        .hero-gradient {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
        }

        .card-gradient {
            background: linear-gradient(135deg, #fdf2f8 0%, #fbcfe8 100%);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(236, 72, 153, 0.4);
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
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            border-radius: 2px;
        }

        .navbar-fixed {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        footer a {
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: #ec4899;
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

        .badge-completed { background: #ec4899; color: white; }
        .badge-development { background: #db2777; color: white; }
        .badge-planning { background: #f472b6; color: white; }
        .badge-hold { background: #9d174d; color: white; }

        /* override blue ke pink */
        .text-blue-600 {
            color: #ec4899 !important;
        }

        .hover\:text-blue-600:hover {
            color: #ec4899 !important;
        }

        .border-blue-600 {
            border-color: #ec4899 !important;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav id="navbar" class="bg-white/95 backdrop-blur-md shadow-sm fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-pink-500 to-pink-700 bg-clip-text text-transparent hover:scale-105 transition-transform">
                    Portofolio.
                </a>

                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-pink-500 transition font-medium {{ request()->routeIs('home') ? 'text-pink-500 border-b-2 border-pink-500' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-pink-500 transition font-medium {{ request()->routeIs('about') ? 'text-pink-500 border-b-2 border-pink-500' : '' }}">Tentang</a>
                    <a href="{{ route('projects') }}" class="text-gray-700 hover:text-pink-500 transition font-medium {{ request()->routeIs('projects') ? 'text-pink-500 border-b-2 border-pink-500' : '' }}">Proyek</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-pink-500 transition font-medium {{ request()->routeIs('contact') ? 'text-pink-500 border-b-2 border-pink-500' : '' }}">Kontak</a>
                </div>

                <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
            <div class="px-4 py-2 space-y-2">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:bg-pink-50 rounded-lg">Beranda</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-gray-700 hover:bg-pink-50 rounded-lg">Tentang</a>
                <a href="{{ route('projects') }}" class="block px-3 py-2 text-gray-700 hover:bg-pink-50 rounded-lg">Proyek</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:bg-pink-50 rounded-lg">Kontak</a>
            </div>
        </div>
    </nav>

    <main class="mt-16">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white pt-12 pb-8 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">

                <div>
                    <h3 class="text-xl font-bold mb-4 bg-gradient-to-r from-pink-400 to-pink-600 bg-clip-text text-transparent">
                        Portofolio.
                    </h3>
                    <p class="text-gray-400">Full Stack Developer.</p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Tautan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-pink-400">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-pink-400">Tentang</a></li>
                        <li><a href="{{ route('projects') }}" class="hover:text-pink-400">Proyek</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-pink-400">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li>Email</li>
                        <li>Phone</li>
                        <li>Indonesia</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Social</h4>
                    <div class="flex gap-3">
                        <a class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600"><i class="fab fa-github"></i></a>
                        <a class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
                © 2024 Portfolio
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        document.getElementById('menu-btn')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @livewireScripts
</body>
</html>
