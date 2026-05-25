@extends('layouts.app')

@section('title', 'Contact Me')

@section('content')
@php
$profile = \App\Models\Profile::active()->first();
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Hubungi Saya<br></span>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mt-2 section-title pb-4">Mari Bekerja Sama</h1>
        <p class="text-gray-600 max-w-2xl mx-auto mt-4">Ada pertanyaan atau ingin berdiskusi? Jangan ragu untuk menghubungi saya</p>
    </div>

    <div class="grid md:grid-cols-2 gap-10">
        <!-- Contact Info -->
        <div data-aos="fade-right" data-aos-delay="100">
            <div class="bg-white rounded-3xl shadow-xl p-8 h-full">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h2>

                <div class="space-y-6">
                    @if($profile && $profile->email)
                    <div class="flex items-start gap-4 group">
                        <div class="w-14 h-14 hero-gradient rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Email</p>
                            <p class="font-semibold text-gray-800 text-lg">{{ $profile->email }}</p>
                            <p class="text-gray-400 text-sm">Kirim email dan saya akan membalas dalam 24 jam</p>
                        </div>
                    </div>
                    @endif

                    @if($profile && $profile->phone)
                    <div class="flex items-start gap-4 group">
                        <div class="w-14 h-14 hero-gradient rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-phone text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Telepon / WhatsApp</p>
                            <p class="font-semibold text-gray-800 text-lg">{{ $profile->phone }}</p>
                            <p class="text-gray-400 text-sm">Senin - Jumat, 09:00 - 17:00</p>
                        </div>
                    </div>
                    @endif

                    @if($profile && $profile->address)
                    <div class="flex items-start gap-4 group">
                        <div class="w-14 h-14 hero-gradient rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Lokasi</p>
                            <p class="font-semibold text-gray-800 text-lg">{{ $profile->address }}</p>
                            <p class="text-gray-400 text-sm">Siap untuk meeting online atau onsite</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Social Links -->
                @if($profile && ($profile->github_url || $profile->linkedin_url || $profile->twitter_url))
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Temukan Saya di</h3>
                    <div class="flex gap-3">
                        @if($profile->github_url)
                        <a href="{{ $profile->github_url }}" target="_blank" class="bg-gray-800 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-gray-700 transition-all hover:scale-110">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Contact Form -->
        <div data-aos="fade-left" data-aos-delay="200">
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
                @livewire('contact-form')
            </div>
        </div>
    </div>
</div>
@endsection
