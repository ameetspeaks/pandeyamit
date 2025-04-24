@extends('layouts.app')

@section('title', $project->title)

@push('styles')
    {{-- Add Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .related-projects-slider .swiper-button-next, 
        .related-projects-slider .swiper-button-prev {
            color: #4f46e5; /* Indigo */
        }
        .related-projects-slider .swiper-slide {
            height: auto; /* Adjust slide height automatically */
        }
    </style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    @if($project->images->where('is_featured', true)->first())
        <div class="absolute inset-0">
            <img src="{{ $project->images->where('is_featured', true)->first()->image_url }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    @endif
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <div class="flex items-center justify-center space-x-4 mb-4">
                @if($project->category)
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white/20 text-white">
                    {{ $project->category->name }}
                </span>
                @endif
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium 
                    {{ $project->status === 'completed' ? 'bg-green-500/20 text-green-100' : 'bg-yellow-500/20 text-yellow-100' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $project->title }}</h1>
            @if($project->meta_description)
                <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                    {{ $project->meta_description }}
                </p>
            @endif
        </div>
    </div>
</div>

<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Featured Image -->
                @if($project->images->where('is_featured', true)->first())
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <img src="{{ $project->images->where('is_featured', true)->first()->image_url }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-auto object-cover max-h-[600px]">
                    </div>
                @endif

                <!-- Project Description -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Project Overview</h2>
                        <div class="prose prose-lg max-w-none mb-8">
                            {!! $project->description !!}
                        </div>

                        @if($project->images->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($project->images->where('is_featured', false) as $image)
                                    <div class="bg-white rounded-xl overflow-hidden shadow">
                                        <div class="aspect-square">
                                            <img src="{{ $image->image_url }}" 
                                                 alt="Project image" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Technologies Used -->
                @if($project->technologies_used)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Technologies Used</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->technologies_used as $tech)
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Project Features -->
                @if(isset($project->features) && is_array($project->features))
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Key Features</h2>
                            <ul class="space-y-4">
                                @foreach($project->features as $feature)
                                    <li class="flex items-start">
                                        <svg class="h-6 w-6 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-600">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Project Info -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Project Information</h2>
                        <dl class="space-y-4">
                            @if($project->client)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Client</dt>
                                <dd class="mt-1 text-lg text-gray-900">{{ $project->client }}</dd>
                            </div>
                            @endif
                            @if($project->duration)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Duration</dt>
                                <dd class="mt-1 text-lg text-gray-900">{{ $project->duration }}</dd>
                            </div>
                            @endif
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Completed</dt>
                                <dd class="mt-1 text-lg text-gray-900">
                                    {{ $project->completed_at ? $project->completed_at->format('F Y') : 'In Progress' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Project Links -->
                @if($project->project_url || $project->github_url)
                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 p-1 rounded-2xl shadow-lg">
                    <div class="bg-white p-6 rounded-2xl">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Project Links</h2>
                        <div class="space-y-4">
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" 
                                   target="_blank"
                                   class="block w-full text-center px-6 py-3 rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all transform hover:scale-105">
                                    View Live Demo
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" 
                                   target="_blank"
                                   class="block w-full text-center px-6 py-3 rounded-xl text-gray-700 bg-gray-100 hover:bg-gray-200 transition-all">
                                    View Source Code
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Related Projects Section --}}
        @if(isset($relatedProjects) && $relatedProjects->count() > 0)
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Projects</h2>
                <!-- Slider main container -->
                <div class="swiper related-projects-slider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($relatedProjects as $relatedProject)
                            <div class="swiper-slide p-4">
                                <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $relatedProject->title }}</h3>
                                        @if($relatedProject->meta_description)
                                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $relatedProject->meta_description }}</p>
                                        @endif
                                        <a href="{{ route('projects.show', $relatedProject) }}" 
                                           class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                            View Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Initialize Related Projects Slider
    const swiper = new Swiper('.related-projects-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>
@endpush

@endsection 