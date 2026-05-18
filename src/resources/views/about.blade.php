@extends('layouts.app')

@section('title', 'About Me - Ahmad Fauzi')

@section('content')
@php
$profile = \App\Models\Profile::active()->first();
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">
    <!-- Profile Section -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
        <div class="md:flex">
            <!-- Profile Image -->
            <div class="md:w-2/5 relative overflow-hidden">
                @if($profile && $profile->profile_image)
                <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="{{ $profile->full_name }}" class="w-full h-full object-cover min-h-[500px] hover:scale-110 transition-transform duration-500">
                @else
                <div class="w-full h-full min-h-[500px] hero-gradient flex items-center justify-center">
                    <i class="fas fa-user-circle text-white text-9xl"></i>
                </div>
                @endif
            </div>

            <!-- Profile Info -->
            <div class="md:w-3/5 p-8 lg:p-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Tentang Saya</span>
                <h1 class="text-4xl font-bold text-gray-800 mt-2 mb-4">{{ $profile->full_name ?? 'Ahmad Fauzi' }}</h1>
                <p class="text-xl text-blue-600 mb-6">{{ $profile->title ?? 'Full Stack Developer' }}</p>

                <div class="prose max-w-none text-gray-700 mb-8 leading-relaxed">
                    {!! $profile->bio ?? '<p>Halo! Saya adalah seorang Full Stack Developer dengan passion dalam membangun aplikasi web yang inovatif dan user-friendly. Saya memiliki pengalaman dalam berbagai teknologi modern dan selalu bersemangat untuk mempelajari hal-hal baru.</p>' !!}
                </div>

                <!-- Contact Info Cards -->
                <div class="grid sm:grid-cols-2 gap-4 mb-8">
                    @if($profile && $profile->email)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 hero-gradient rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Email</p>
                            <p class="text-sm font-semibold">{{ $profile->email }}</p>
                        </div>
                    </div>
                    @endif

                    @if($profile && $profile->phone)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 hero-gradient rounded-full flex items-center justify-center">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Telepon</p>
                            <p class="text-sm font-semibold">{{ $profile->phone }}</p>
                        </div>
                    </div>
                    @endif

                    @if($profile && $profile->address)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 hero-gradient rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Lokasi</p>
                            <p class="text-sm font-semibold">{{ $profile->address }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Social Links -->
                @if($profile && ($profile->github_url || $profile->linkedin_url || $profile->twitter_url))
                <div class="flex gap-3">
                    @if($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="bg-gray-800 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-gray-700 transition-all hover:scale-110">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                    @endif
                    @if($profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-600 transition-all hover:scale-110">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    @endif
                    @if($profile->twitter_url)
                    <a href="{{ $profile->twitter_url }}" target="_blank" class="bg-blue-400 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-blue-300 transition-all hover:scale-110">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Experience Section -->
    @if($profile && $profile->experience)
    <div class="mt-12" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-8">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Perjalanan Karir</span>
            <h2 class="text-3xl font-bold text-gray-800 mt-2 section-title pb-4">Pengalaman Kerja</h2>
        </div>
        <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
            <div class="prose max-w-none">
                {!! $profile->experience !!}
            </div>
        </div>
    </div>
    @endif

    <!-- Education Section -->
    @if($profile && $profile->education)
    <div class="mt-12" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center mb-8">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Pendidikan</span>
            <h2 class="text-3xl font-bold text-gray-800 mt-2 section-title pb-4">Latar Belakang Pendidikan</h2>
        </div>
        <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
            <div class="prose max-w-none">
                {!! $profile->education !!}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
