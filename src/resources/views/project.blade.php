@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
@php
$projects = \App\Models\Project::latest()->paginate(6);
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-pink-500 font-semibold text-sm uppercase tracking-wider">Portofolio</span>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mt-2 section-title pb-4">Proyek Saya</h1>
        <p class="text-gray-600 max-w-2xl mx-auto mt-4">
            Berikut adalah beberapa proyek yang telah saya kerjakan
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($projects as $index => $project)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-scale group"
             data-aos="fade-up"
             data-aos-delay="{{ ($index % 3) * 100 }}">

            <div class="relative overflow-hidden">

                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}"
                         class="w-full h-64 object-cover group-hover:scale-105 transition duration-500"
                         alt="{{ $project->title }}">
                @else
                    <div class="w-full h-64 hero-gradient flex items-center justify-center">
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

                <p class="text-gray-600 mb-4 leading-relaxed">
                    {{ Str::limit($project->description, 100) }}
                </p>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(explode(',', $project->tech_stack) as $tech)
                        <span class="bg-pink-50 text-pink-600 px-3 py-1 rounded-full text-xs font-medium">
                            {{ trim($tech) }}
                        </span>
                    @endforeach
                </div>

                <div class="mb-5">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Progress</span>
                        <span class="font-semibold text-pink-500">{{ $project->progress }}%</span>
                    </div>

                    <div class="bg-gray-200 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-pink-500 to-pink-700 rounded-full h-2 progress-bar"
                             style="width: {{ $project->progress }}%">
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-3 border-t border-gray-100">

                    @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank"
                       class="flex-1 text-center bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition font-semibold text-sm inline-flex items-center justify-center gap-2">
                        <i class="fas fa-external-link-alt"></i> Demo
                    </a>
                    @endif

                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank"
                       class="flex-1 text-center bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition font-semibold text-sm inline-flex items-center justify-center gap-2">
                        <i class="fab fa-github"></i> Source
                    </a>
                    @endif

                    @if(!$project->project_url && !$project->github_url)
                        <span class="text-gray-400 text-sm">Tersedia segera</span>
                    @endif

                </div>

            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-16" data-aos="fade-up">
            <i class="fas fa-folder-open text-8xl text-gray-300 mb-6"></i>
            <p class="text-gray-500 text-xl mb-4">Belum ada proyek yang ditambahkan</p>
            <p class="text-gray-400">Silakan login ke admin panel untuk menambahkan proyek</p>

            <a href="/admin"
               class="inline-block mt-6 btn-primary text-white px-8 py-3 rounded-full font-semibold hover:scale-105 transition">
                <i class="fas fa-plus mr-2"></i> Tambah Proyek
            </a>
        </div>
        @endforelse

    </div>

    @if($projects->hasPages())
    <div class="mt-12" data-aos="fade-up">
        <div class="flex justify-center">
            {{ $projects->links() }}
        </div>
    </div>
    @endif

</div>

<style>
.pagination {
    display: flex;
    gap: 8px;
    list-style: none;
}

.pagination li a,
.pagination li span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    border-radius: 12px;
    background: white;
    color: #4b5563;
    font-weight: 500;
    transition: all 0.3s ease;
}

.pagination li.active span {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: white;
}

.pagination li a:hover {
    background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
    color: white;
    transform: translateY(-2px);
}
</style>

@endsection
