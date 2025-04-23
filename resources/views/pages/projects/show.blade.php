@extends('layouts.app')

@section('title', $project->title)

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <div class="flex items-center justify-center space-x-4 mb-4">
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white/20 text-white">
                    {{ $project->category->name }}
                </span>
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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Project Images -->
                @if($project->featured_image)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <img src="{{ asset('storage/' . $project->featured_image) }}" 
                             alt="{{ $project->title }}"
                             class="w-full h-96 object-cover">
                    </div>
                @endif

                <!-- Project Description -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Project Overview</h2>
                        <div class="prose prose-lg max-w-none">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>

                <!-- Technologies Used -->
                @if($project->technologies)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Technologies Used</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->technologies as $tech)
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Project Features -->
                @if($project->features)
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
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Client</dt>
                                <dd class="mt-1 text-lg text-gray-900">{{ $project->client }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Duration</dt>
                                <dd class="mt-1 text-lg text-gray-900">{{ $project->duration }}</dd>
                            </div>
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

                <!-- Related Projects -->
                @if($relatedProjects->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-8">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Related Projects</h2>
                            <div class="space-y-6">
                                @foreach($relatedProjects as $relatedProject)
                                    <a href="{{ route('projects.show', $relatedProject) }}" 
                                       class="group block hover:bg-gray-50 rounded-xl p-4 transition-colors">
                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                            {{ $relatedProject->title }}
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">
                                            {{ $relatedProject->category->name }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 