@extends('layouts.app')

@section('title', 'Home - Ahmad Fauzi | Full Stack Developer')

@section('content')
@php
$profile = \App\Models\Profile::active()->first();
$featuredProjects = \App\Models\Project::where('is_featured', true)->take(3)->get();
@endphp

<!-- Hero Section -->
<section class="hero-gradient text-white min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-4 py-20">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">

            <div class="md:w-1/2 text-center md:text-left" data-aos="fade-right">

                <div class="inline-block px-4 py-2 bg-white/20 rounded-full mb-6">
                    <span class="text-sm">👋 Welcome to my portfolio</span>
                </div>

                <h1 class="text-5xl md:text-6xl font-bold mb-4 leading-tight">
                    Hi, I'm <span class="text-yellow-300">{{ $profile->full_name ?? 'Mery Ismalia' }}</span>
                </h1>

                <p class="text-xl md:text-2xl mb-4 opacity-95">{{ $profile->title ?? 'Full Stack Developer' }}</p>

                <p class="text-lg mb-8 opacity-90 max-w-lg mx-auto md:mx-0 leading-relaxed">
                    {{ $profile->short_bio ?? 'Membangun aplikasi web modern, responsif, dan scalable dengan teknologi terkini.' }}
                </p>

                <div class="flex gap-4 justify-center md:justify-start">

                    <a href="{{ route('projects') }}"
                       class="bg-white text-pink-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all hover:scale-105 shadow-lg inline-flex items-center gap-2">
                        <i class="fas fa-folder-open"></i> Lihat Proyek
                    </a>

                    <a href="{{ route('contact') }}"
                       class="border-2 border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-pink-600 transition-all hover:scale-105 inline-flex items-center gap-2">
                        <i class="fas fa-envelope"></i> Hubungi
                    </a>

                </div>

            </div>

            <div class="md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-delay="200">
                <div class="relative">

                    <div class="absolute inset-0 bg-yellow-300 rounded-full blur-2xl opacity-30 animate-pulse"></div>
                    <div class="absolute inset-4 bg-pink-400 rounded-full blur-xl opacity-20 animate-pulse"></div>

                    @if($profile && $profile->profile_image)
                        <img src="{{ asset('images/porto.png') }}" alt="Profile">
                    @else
                        <div class="w-72 h-72 rounded-full bg-gradient-to-r from-yellow-400 to-pink-500 flex items-center justify-center shadow-2xl relative z-10">
                            <i class="fas fa-code text-white text-7xl"></i>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Projects -->
@if($featuredProjects && $featuredProjects->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-pink-500 font-semibold text-sm uppercase tracking-wider">Portofolio</span>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 section-title pb-4">
                Proyek Unggulan
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto mt-4">
                Beberapa proyek terbaik yang telah saya kerjakan
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($featuredProjects as $index => $project)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-scale group"
                 data-aos="fade-up"
                 data-aos-delay="{{ $index * 100 }}">

                <div class="relative overflow-hidden">

                    @if($project->image_url)
                        <img src="{{ asset('images/tampilan.jpg') }}" alt="Profile">
                    @else
                        <div class="w-full h-64 hero-gradient flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-laptop-code text-white text-6xl"></i>
                        </div>
                    @endif

                    <div class="absolute top-4 right-4">
                        <span class="badge
                            @if($project->status == 'completed') badge-completed
                            @elseif($project->status == 'development') badge-development
                            @elseif($project->status == 'planning') badge-planning
                            @else badge-hold @endif">
                            {{ $project->status_text }}
                        </span>
                    </div>

                </div>

                <div class="p-6">

                    <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-pink-500 transition">
                        {{ $project->title }}
                    </h3>

                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($project->description, 100) }}
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                            <span class="bg-pink-50 text-pink-600 px-3 py-1 rounded-full text-xs font-medium">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Progress Pengerjaan</span>
                            <span class="font-semibold text-pink-500">{{ $project->progress }}%</span>
                        </div>

                        <div class="bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-pink-500 to-pink-700 rounded-full h-2 progress-bar"
                                 style="width: {{ $project->progress }}%">
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('projects') }}"
                       class="text-pink-500 font-semibold hover:text-pink-700 transition inline-flex items-center gap-1 group">
                        Lihat Detail
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>

                </div>

            </div>
            @endforeach

        </div>

        <div class="text-center mt-12" data-aos="fade-up">
            <a href="{{ route('projects') }}"
               class="btn-primary text-white px-8 py-3 rounded-full font-semibold inline-flex items-center gap-2">
                Lihat Semua Proyek <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>
@endif

<!-- Stats Section -->
<section class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4">

        <div class="grid md:grid-cols-3 gap-8 text-center">

            <div data-aos="fade-up">
                <div class="text-4xl font-bold mb-2">3+</div>
                <div class="text-lg opacity-90">Tahun Pengalaman</div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold mb-2">{{ \App\Models\Project::count() }}</div>
                <div class="text-lg opacity-90">Proyek Selesai</div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold mb-2">100%</div>
                <div class="text-lg opacity-90">Kepuasan Klien</div>
            </div>

        </div>

    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">

        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            Siap Bekerja Sama?
        </h2>

        <p class="text-xl text-gray-600 mb-8">
            Saya selalu terbuka untuk diskusi dan kolaborasi proyek baru
        </p>

        <a href="{{ route('contact') }}"
           class="btn-primary text-white px-10 py-4 rounded-full font-semibold inline-flex items-center gap-2 shadow-lg">
            <i class="fas fa-paper-plane"></i> Mulai Diskusi
        </a>

    </div>
</section>

@endsection
