@extends('layouts.app')

@section('title', 'About Me - Mery Ismalia')

@section('content')
@php
$profile = \App\Models\Profile::active()->first();

// Fungsi untuk memproses data experience
function parseExperienceData($data) {
    if (empty($data)) return [];

    // Jika sudah berupa array
    if (is_array($data)) return $data;

    // Jika string JSON
    $decoded = json_decode($data, true);
    if (is_array($decoded)) return $decoded;

    // Jika string HTML biasa
    return [];
}

// Fungsi untuk memproses data education
function parseEducationData($data) {
    if (empty($data)) return [];

    // Jika sudah berupa array
    if (is_array($data)) return $data;

    // Jika string JSON
    $decoded = json_decode($data, true);
    if (is_array($decoded)) return $decoded;

    // Jika string HTML biasa
    return [];
}

$experiences = parseExperienceData($profile->experience ?? '');
$educations = parseEducationData($profile->education ?? '');
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">
    <!-- Profile Section -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
        <div class="md:flex">
            <!-- Profile Image -->
            <div class="md:w-2/5 relative overflow-hidden">
                @if($profile && $profile->profile_image)
                <img src="{{ asset('images/image.png') }}" alt="Profile">
                @else
                <div class="w-full h-full min-h-[500px] hero-gradient flex items-center justify-center">
                    <i class="fas fa-user-circle text-white text-9xl"></i>
                </div>
                @endif
            </div>

            <!-- Profile Info -->
            <div class="md:w-3/5 p-8 lg:p-12">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Tentang Saya</span>
                <h1 class="text-4xl font-bold text-gray-800 mt-2 mb-4">{{ $profile->full_name ?? 'Mery Ismalia' }}</h1>
                <p class="text-xl text-blue-600 mb-6">{{ $profile->title ?? '' }}</p>

                <div class="prose max-w-none text-gray-700 mb-8 leading-relaxed">
                    {!! $profile->bio ?? '<p></p>' !!}
                </div>

                <!-- Contact Info Cards -->
                <div class="grid grid-cols-1 gap-4 mb-8">
                    @if($profile && $profile->email)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 hero-gradient rounded-full overflow-hidden flex items-center justify-center">
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
                        <div class="w-10 h-10 hero-gradient rounded-full overflow-hidden flex items-center justify-center">
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
                        <div class="w-10 h-10 hero-gradient rounded-full overflow-hidden flex items-center justify-center">
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
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Experience Section -->
    <div class="mt-12" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-8">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">perjalanan karir & pendidikan<br></span>
            <h2 class="text-3xl font-bold text-gray-800 mt-2 section-title pb-4"><br>Pengalaman Kerja</h2>
        </div>

        @if(count($experiences) > 0)
            <div class="space-y-6">
                @foreach($experiences as $exp)
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all">
                    <div class="flex flex-wrap gap-4">
                        <div class="w-14 h-14 hero-gradient rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-briefcase text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800">{{ $exp['position'] ?? '' }}</h3>
                            <p class="text-blue-600 font-semibold">{{ $exp['company'] ?? '' }}</p>
                            <div class="flex items-center gap-2 text-sm text-gray-500 mt-1 mb-3">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $exp['period'] ?? '' }}</span>
                            </div>
                            <p class="text-gray-600 leading-relaxed">{{ $exp['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <i class="fas fa-briefcase text-5xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">Belum ada data pengalaman kerja</p>
            </div>
        @endif
    </div>

    <!-- Education Section -->
    <div class="mt-12" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center mb-8">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider"></span>
            <h2 class="text-3xl font-bold text-gray-800 mt-2 section-title pb-4">Latar Belakang Pendidikan</h2>
        </div>

        @if(count($educations) > 0)
            <div class="space-y-6">
                @foreach($educations as $edu)
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all">
                    <div class="flex flex-wrap gap-4">
                        <div class="w-14 h-14 hero-gradient rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800">{{ $edu['degree'] ?? '' }}</h3>
                            <p class="text-blue-600 font-semibold">{{ $edu['university'] ?? '' }}</p>
                            <div class="flex items-center gap-2 text-sm text-gray-500 mt-1 mb-3">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $edu['year'] ?? '' }}</span>
                            </div>
                            <p class="text-gray-600 leading-relaxed">{{ $edu['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <i class="fas fa-graduation-cap text-5xl text-gray-300 mb-3"></i>
                <p class="text-gray-500">Belum ada data pendidikan</p>
            </div>
        @endif
    </div>
</div>
@endsection
